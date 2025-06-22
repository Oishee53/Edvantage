<?php

namespace App\Http\Controllers;

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
    $courses = Courses::with(['students'])->get();

    return view('Student.view_all_student', compact('courses'));
}
}
