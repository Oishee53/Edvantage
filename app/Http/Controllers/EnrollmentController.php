<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
   

public function enroll($courseId)
{
    $user = Auth::user();

    // Prevent duplicate enrollments
    if (!Enrollment::where('user_id', $user->id)->where('course_id', $courseId)->exists()) {
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
        ]);
    }

   return redirect()->route('courses.all')->with('success', 'Enrolled successfully!');

}

}
