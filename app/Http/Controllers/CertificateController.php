<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Courses;
use App\Models\User;
use App\Models\Certificate;
use App\Models\VideoProgress;
use App\Models\QuizSubmission;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function generate($userId, $courseId)
    {
        $user = auth()->user();

        // Make sure user is requesting their own certificate
        if ($user->id != $userId) {
            abort(403, 'Unauthorized action.');
        }

        $course = Courses::findOrFail($courseId);

        // ----- 🔍 FIRST: Let's understand your database structure -----
        
        // Get a sample resource to see what columns exist
        $sampleResource = $course->resources()->first();
        
        if (!$sampleResource) {
            return redirect()->back()->with('error', 'No resources found for this course.');
        }

        // Get all column names from resources table
        $resourceColumns = DB::getSchemaBuilder()->getColumnListing('resources');
        
        // Debug: Show what we're working with
        \Log::info("Database Structure Debug", [
            'resource_columns' => $resourceColumns,
            'sample_resource_data' => $sampleResource->toArray(),
            'course_id' => $courseId
        ]);

        // ----- 🎥 Check video completion (FIXED) -----
        // Let's try different possible column names for videos
        $totalVideos = 0;
        
        if (in_array('videos', $resourceColumns)) {
            // If there's a 'videos' column
            $totalVideos = $course->resources()->whereNotNull('videos')->count();
        } elseif (in_array('video_path', $resourceColumns)) {
            // If there's a 'video_path' column
            $totalVideos = $course->resources()->whereNotNull('video_path')->count();
        } elseif (in_array('type', $resourceColumns)) {
            // If there's a 'type' column that indicates video
            $totalVideos = $course->resources()->where('type', 'video')->count();
        } elseif (in_array('resource_type', $resourceColumns)) {
            // If there's a 'resource_type' column
            $totalVideos = $course->resources()->where('resource_type', 'video')->count();
        } else {
            // Fallback: count all resources as potential videos
            $totalVideos = $course->resources()->count();
        }
        
        $completedVideos = VideoProgress::where('user_id', $user->id)
            ->whereIn('resource_id', $course->resources()->pluck('id'))
            ->where('is_completed', 1)
            ->count();

        $completionPercentage = $totalVideos > 0 
            ? round(($completedVideos / $totalVideos) * 100) 
            : 0;

        // ----- 📝 Check average quiz score (FIXED to match dashboard) -----
        $courseQuizzes = $course->quizzes()->pluck('id');
        $quizSubmissions = QuizSubmission::where('user_id', $user->id)
            ->whereIn('quiz_id', $courseQuizzes)
            ->with('quiz') // Load the quiz relationship to get total_marks
            ->get();

        // Calculate percentage for each quiz (same as dashboard)
        $quizPercentages = $quizSubmissions->map(function ($submission) {
            $totalMarks = $submission->quiz->total_marks ?? 0;
            $percentage = $totalMarks > 0
                ? round(($submission->score / $totalMarks) * 100, 2)
                : 0;
            return $percentage;
        });

        // Average percentage across all quizzes (same as dashboard)
        $averageScore = $quizPercentages->count() > 0 
            ? round($quizPercentages->avg()) 
            : 0;

        // ----- 🐛 DEBUG: Log the values -----
        \Log::info("Certificate Debug for User {$user->id}, Course {$courseId}", [
            'total_videos' => $totalVideos,
            'completed_videos' => $completedVideos,
            'completion_percentage' => $completionPercentage,
            'course_quiz_ids' => $courseQuizzes->toArray(),
            'quiz_submissions_count' => $quizSubmissions->count(),
            'quiz_submissions_with_details' => $quizSubmissions->map(function($sub) {
                return [
                    'quiz_id' => $sub->quiz_id,
                    'score' => $sub->score,
                    'total_marks' => $sub->quiz->total_marks ?? 0,
                    'percentage' => $sub->quiz->total_marks > 0 ? round(($sub->score / $sub->quiz->total_marks) * 100, 2) : 0
                ];
            })->toArray(),
            'quiz_percentages' => $quizPercentages->toArray(),
            'average_percentage' => $averageScore,
            'old_wrong_average' => $quizSubmissions->avg('score') // This was the wrong calculation
        ]);

        // ----- ✅ Check eligibility -----
        if ($completionPercentage < 100 || $averageScore < 70) {
            return redirect()->back()->with('error', 
                "You are not eligible for this certificate. " .
                "Video completion: {$completionPercentage}%, Quiz average: {$averageScore}%. " .
                "Requirements: 100% videos + 70% quiz average."
            );
        }

        // ----- 🎓 Generate Certificate -----
        $pdf = Pdf::loadView('Resources.certificate', [
            'user'   => $user,
            'course' => $course,
            'avgScore'  => $averageScore,
        ]);

        return $pdf->stream('certificate_' . $course->title . '.pdf');
    }

    
    
   
}