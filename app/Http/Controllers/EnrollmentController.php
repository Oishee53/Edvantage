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

public function showEnrolledCourses()
{
    $user = Auth::user();
    $enrolledCourses = $user->enrolledCourses;

    return view('User.enrolled_courses', compact('enrolledCourses'));
}


public function userEnrolledCourses()
{
    $user = Auth::user();
    $enrolledCourses = $user->enrollments()->with('course')->get()->pluck('course');
    return view('User.enrolled_courses', compact('user','enrolledCourses'));
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
