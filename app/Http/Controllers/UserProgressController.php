<?php
namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Courses;
use App\Models\VideoProgress;
use App\Models\Resource;
use App\Models\Quiz;
use App\Models\QuizSubmission;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class UserProgressController extends Controller
{
public function index()
{
    $user = auth()->user();
    $userId = $user->id;


    // Fetch all courses the user is enrolled in
    $courses = Courses::whereHas('enrollments', function ($q) use ($userId) {
        $q->where('user_id', $userId);
    })->get();

    $courseProgress = [];

    foreach ($courses as $course) {
        // Video progress
        $totalVideos = $course->resources()->count();
        $completedVideos = VideoProgress::where('user_id', $userId)
            ->whereIn('resource_id', $course->resources->pluck('id'))
            ->where('is_completed', true)
            ->count();

        // Quiz scores for that course
        $quizzes = Quiz::where('course_id', $course->id)->get();
        $quizMarks = QuizSubmission::where('user_id', $userId)
            ->whereIn('quiz_id', $quizzes->pluck('id'))
            ->get()
            ->map(function ($submission) {
                return [
                    'quiz_title' => $submission->quiz->title,
                    'score' => $submission->score
                ];
            });

        $completionPercentage = $totalVideos > 0
            ? round(($completedVideos / $totalVideos) * 100, 2)
            : 0;

        $courseProgress[] = [
            'course_id' => $course->id,
            'course_name' => $course->title,
            'completed_videos' => $completedVideos,
            'total_videos' => $totalVideos,
            'completion_percentage' => $completionPercentage,
            'quiz_marks' => $quizMarks
        ];
    }

    return view('User.progress', [
    'courseProgress' => $courseProgress,
    'user' => $user,
    'enrolledCourses' => $courses, 
]);


}
}
