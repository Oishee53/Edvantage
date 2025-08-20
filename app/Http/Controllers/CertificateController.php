<?php
namespace App\Http\Controllers;

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
   public function generate1($courseId)
{
    $user = auth()->user();

    // 1. Video completion
    $totalVideos = VideoProgress::where('user_id', $user->id)
        ->where('course_id', $courseId)
        ->count();
    $completedVideos = VideoProgress::where('user_id', $user->id)
        ->where('course_id', $courseId)
        ->where('is_completed', true)
        ->count();

    if ($totalVideos == 0 || $completedVideos != $totalVideos) {
        return back()->with('error', 'Complete all videos to unlock the certificate.');
    }

    // 2. Quiz completion
    $quizIds = Quiz::where('course_id', $courseId)->pluck('id');
    $avgScore = QuizSubmission::where('user_id', $user->id)
        ->whereIn('quiz_id', $quizIds)
        ->avg('score');

    if ($avgScore === null || $avgScore < 70) {
        return back()->with('error', 'Score at least 70% in quizzes to unlock the certificate.');
    }

    // 3. Generate PDF
    $course = Courses::findOrFail($courseId);
    $data = [
        'user' => $user,
        'course' => $course,
        'avgScore' => $avgScore,  // pass this to Blade
        'date' => now()->toDateString(),
    ];

    $pdf = Pdf::loadView('Resources.certificate', $data);

    // 4. Save PDF in storage
    $fileName = "certificates/{$user->id}_course_{$courseId}.pdf";
    Storage::put("public/{$fileName}", $pdf->output());

    // 5. Save certificate record
    Certificate::updateOrCreate(
        ['user_id' => $user->id, 'course_id' => $courseId],
        ['certificate_path' => $fileName]
    );

    // 6. Force download
    return $pdf->download("certificate_{$course->title}.pdf");


}


 public function generate($userId, $courseId, $avgScore)
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
        return $pdf->download('certificate_'.$user->id.'.pdf');
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

