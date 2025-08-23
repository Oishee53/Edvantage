<?php

namespace App\Http\Controllers;


use App\Models\Quiz;
use App\Models\Courses;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\PendingCourses;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Container\Attributes\Log;

class ResourceController extends Controller
{
    public function viewCourses(){
    if(Auth::user()->role === 2) {
        $courses = Courses::all();
        return view('Resources.course_list', compact('courses'));
    } 
    elseif (Auth::user()->role === 3) {
        $instructorId = auth()->user()->id;
        $courses = Courses::where('instructor_id', $instructorId)->get();
        $pendingCourses = PendingCourses::where('instructor_id', $instructorId)->get();
        return view('Resources.course_list', compact('courses','pendingCourses', 'instructorId'));
    }
    }
    public function viewPage()
    {
    $courses = Courses::all();
    return view('Resources.view_resources', compact('courses'));
    }
public function showModules($course_id)
{
    $course = Courses::findOrFail($course_id);

    $user = auth()->user();
    $uploadedModuleIds = collect();

    if ($user->role === 3) {
        // Students: only check quizzes
        $uploadedModuleIds = DB::table('quizzes')
            ->where('course_id', $course_id)
            ->pluck('module_number');
    } elseif ($user->role === 2) {
        // Instructors/Admins: check both quizzes and resources
        $quizModules = DB::table('quizzes')
            ->where('course_id', $course_id)
            ->pluck('module_number');

        $resourceModules = DB::table('resources')
            ->where('courseId', $course_id)
            ->pluck('moduleId');

        $uploadedModuleIds = $quizModules
            ->intersect($resourceModules)
            ->unique();
    }

    // Normalize IDs to integers
    $uploadedModuleIds = $uploadedModuleIds
        ->map(fn($id) => (int) $id)
        ->values()
        ->all();

    // Build modules with upload status
    $modules = [];
    for ($i = 1; $i <= (int) $course->video_count; $i++) {
        $modules[] = [
            'id'       => $i,
            'uploaded' => in_array($i, $uploadedModuleIds, true),
        ];
    }

    return view('Resources.show_modules', compact('course', 'modules'));
}



    public function editModule($course_id, $module_id){
    $course = Courses::findOrFail($course_id);

    if ($module_id < 1 || $module_id > $course->video_count) {
        abort(404); 
    }

    return view('Resources.edit_module', compact('course', 'module_id'));
}
public function addModule(Request $request){
    $courseId = $request->course;
    $moduleNumber = $request->module;

    $course = Courses::findOrFail($courseId);

    return view('Resources.module_management', [
        'course' => $course,
        'moduleNumber' => $moduleNumber,
    ]);
    }
 
}
