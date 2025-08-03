<?php
namespace App\Http\Controllers;
use App\Models\Enrollment;
use App\Models\Courses;
use App\Models\VideoProgress;
use App\Models\Resource;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class UserProgressController extends Controller
{
public function index()
{
    $userId = auth()->id();

    // Step 1: Get all courses the user is enrolled in
    $enrolledCourseIds = Enrollment::where('user_id', $userId)->pluck('course_id');

    $courseProgress = [];

    foreach ($enrolledCourseIds as $courseId) {
        $course = Courses::find($courseId);

        if (!$course) continue;

        // Step 2: Count total videos for the course
        $totalVideos = Resource::where('courseId', $courseId)->count();

        // Step 3: Count completed videos from video_progress
        $completedVideos = VideoProgress::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('is_completed', true)
            ->count();

        // Step 4: Calculate percentage
        $completionPercentage = $totalVideos > 0
            ? round(($completedVideos / $totalVideos) * 100)
            : 0;

        $courseProgress[] = [
            'course_id' => $course->id,
            'course_name' => $course->title,
            'completed_videos' => $completedVideos,
            'total_videos' => $totalVideos,
            'completion_percentage' => $completionPercentage,
        ];
    }

    return view('user.progress', compact('courseProgress'));
}


}
