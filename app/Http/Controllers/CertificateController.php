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

class CertificateController extends Controller
{
   
public function generate1($userId, $courseId, $avgScore)
    {
        // Fetch user and course
        $user = User::findOrFail($userId);
        $course = Courses::findOrFail($courseId);

        // Load the certificate view
        $pdf = Pdf::loadView('Resources.certificate', [
            'user' => $user,
            'course' => $course,
            'avgScore' => $avgScore
        ]);

        // Download as a file
        return $pdf->stream('certificate_'.$user->id.'.pdf');
    }

public function generate($userId, $courseId)
    {
        $user = auth()->user();

        // Make sure user is requesting their own certificate
        if ($user->id != $userId) {
            abort(403, 'Unauthorized action.');
        }

        $course = Courses::findOrFail($courseId);

        // ----- 🎥 Check video completion -----
        $totalVideos = $course->resources()->whereNotNull('videos')->count();
        $completedVideos = VideoProgress::where('user_id', $user->id)
            ->whereIn('resource_id', $course->resources()->pluck('id'))
            ->where('is_completed', '=', 1)
            ->count();

        $completionPercentage = $totalVideos > 0
            ? round(($completedVideos / $totalVideos) * 100)
            : 0;

        // ----- 📝 Check average quiz score -----
        $quizSubmissions = QuizSubmission::where('user_id', $user->id)
            ->whereIn('quiz_id', $course->quizzes()->pluck('id'))
            ->get();

        $averageScore = $quizSubmissions->count() > 0
            ? round($quizSubmissions->avg('score'))
            : 0;

        // ----- ✅ Check eligibility -----
        if ($completionPercentage < 100 || $averageScore < 70) {
            return redirect()->back()->with('error', 'You are not eligible for this certificate.');
        }

        // ----- 🎓 Generate Certificate -----
        $pdf = Pdf::loadView('Resources.certificate', [
            'user'   => $user,
            'course' => $course,
            'score'  => $averageScore,
        ]);

        return $pdf->download('certificate_' . $course->title . '.pdf');
    }


    public function check($userId, $courseId)
{
    $certificate = Certificate::where('user_id', $userId)
        ->where('course_id', $courseId)
        ->first();

    if ($certificate) {
        return response()->json([
            'available' => true,
            'certificate_url' => Storage::url($certificate->certificate_path)
        ]);
    }

    return response()->json(['available' => false]);
}

}

