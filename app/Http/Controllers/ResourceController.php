<?php

namespace App\Http\Controllers;


use App\Models\Courses;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Container\Attributes\Log;

class ResourceController extends Controller
{
    public function viewCourses(){
    $courses = Courses::all();
    return view('Resources.course_list', compact('courses'));
    }
    public function viewPage()
    {
    $courses = Courses::all();
    return view('Resources.view_resources', compact('courses'));
    }
    public function showModules($course_id)
    {
    $course = Courses::findOrFail($course_id);
    $modules = range(1, $course->video_count); 
    return view('Resources.show_modules', compact('course', 'modules'));
    }
    public function editModule($course_id, $module_id){
    $course = Courses::findOrFail($course_id);

    if ($module_id < 1 || $module_id > $course->video_count) {
        abort(404); 
    }

    return view('Resources.edit_module', compact('course', 'module_id'));
}
 
}
