<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function enrolledStudents()
{
    $courses = Courses::with(['students'])->get();

    return view('Student.view_enrolled_student', compact('courses'));
}
public function allStudents()
{
    $students =User::where('role', User::ROLE_USER)->get();                  
    return view('Student.view_all_student', compact('students'));
}
public function destroy($course_id, $student_id)
{
    Enrollment::where('course_id', $course_id)
                ->where('user_id', $student_id)
                ->delete();

    return redirect()->back()->with('success', 'Student unenrolled successfully.');
}

}
