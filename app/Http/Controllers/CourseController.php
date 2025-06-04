<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CourseController extends Controller
{
   

public function viewCourses()
{
    $courses = Courses::all();
    return view('courses.all_courses', compact('courses'));
}


public function show($id)
{
    $course = Courses::findOrFail($id); // fetch course or show 404
    return view('courses.course_details', compact('course'));
}

}
