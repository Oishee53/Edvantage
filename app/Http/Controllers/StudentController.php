<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
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
}
