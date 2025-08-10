<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Resource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use App\Models\Quiz;
use App\Models\VideoProgress;

class EnrollmentController extends Controller
{
public function checkout()
{
    $user = Auth::user();

    // Get all cart items for the authenticated user
    $cartItems = Cart::where('user_id', $user->id)->get();

    foreach ($cartItems as $item) {
        // Prevent duplicate enrollments
        if (!Enrollment::where('user_id', $user->id)->where('course_id', $item->course_id)->exists()) {
            Enrollment::create([
                'user_id' => $user->id,
                'course_id' => $item->course_id,
            ]);
        }
    }

    // Clear cart after successful enrollment
    Cart::where('user_id', $user->id)->delete();

    return redirect()->route('courses.all')->with('success', 'Checkout successful. You are now enrolled in all selected courses!');
}




public function userEnrolledCourses()
{
    $user = Auth::user();
    $enrolledCourses = $user->enrollments()->with('course')->get()->pluck('course');
    $enrolledCourseIds = Enrollment::where('user_id', $user)->pluck('course_id');

    $courseProgress = [];

    foreach ($enrolledCourseIds as $courseId) {
        $course = Courses::find($courseId);

        if (!$course) continue;

        // Step 2: Count total videos for the course
        $totalVideos = Resource::where('courseId', $courseId)->count();

        // Step 3: Count completed videos from video_progress
        $completedVideos = VideoProgress::where('user_id', $user)
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

    return view('User.enrolled_courses', compact('user','enrolledCourses', 'courseProgress'));
}

public function viewCourseModules($courseId)
{
   

   $course = Courses::findOrFail($courseId);

 
    $videoCount = $course->video_count; 

    $modules = range(1, $videoCount);

    return view('user.course_modules', compact('course', 'modules'));
}

public function showInsideModule($courseId, $moduleNumber)
{
    $resource = Resource::where('courseId', $courseId)->where('moduleId', $moduleNumber)->firstOrFail();
    $course = Courses::findOrFail($courseId);
    $quiz = Quiz::where('course_id', $courseId)
                ->where('module_number', $moduleNumber)
                ->first();
    $questions = $quiz ? $quiz->questions : collect();

    return view('Resources.inside_module', [
        'course' => $course,
        'quiz' => $quiz,
        'questions' => $questions,
        'moduleNumber' => $moduleNumber,
        'resource' => $resource,
    ]);
}



public function viewPDF($id)
{
    $resource = Resource::findOrFail($id);

    // Cloudinary public URL
    $pdfUrl = $resource->pdf;



    //Option 2: Stream the file securely through your server (better for privacy, heavier on backend)
    $response = Http::get($pdfUrl);
    return Response::make($response->body(), 200, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="module-resource.pdf"',
    ]);
}
    
}
