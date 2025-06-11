<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


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
    $courses = $user->enrolledCourses;

    return view('User.enrolled_courses', compact('courses'));
}

}
