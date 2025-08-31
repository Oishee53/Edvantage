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
        $user   = auth()->user();
        $moduleCount = $course->module;
        $modules = [];

        $allModulesCompleted = true; // means both resource + quiz exist for all modules

        for ($i = 1; $i <= $moduleCount; $i++) {
            // Check both resource + quiz for this module
            $resourceExists = DB::table('resources')
                ->where('courseId', $course_id)
                ->where('moduleNumber', $i)
                ->exists();

            $quizExists = DB::table('quizzes')
                ->where('course_id', $course_id)
                ->where('module_number', $i)
                ->exists();

            // Module-level status
            $moduleCompleted = $resourceExists || $quizExists;

            // Add info into array
            $modules[] = [
                'id'                => $i,
                'resource_uploaded' => $resourceExists,
                'quiz_uploaded'     => $quizExists,
                'completed'         => $moduleCompleted,
            ];

            // If any module is incomplete, overall completion is false
            if (!$moduleCompleted) {
                $allModulesCompleted = false;
            }
        }

        return view('Resources.show_modules', compact(
            'course',
            'modules',
            'allModulesCompleted'
        ));
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

    // Check if this module has a quiz
    $hasQuiz = DB::table('quizzes')
        ->where('course_id', $courseId)
        ->where('module_number', $moduleNumber)
        ->exists();

    // Check if this module has a resource
    $hasResource = DB::table('resources')
        ->where('courseId', $courseId)
        ->where('moduleId', $moduleNumber)
        ->exists();

    return view('Resources.module_management', [
        'course' => $course,
        'moduleNumber' => $moduleNumber,
        'quiz' => $hasQuiz,
        'resource' => $hasResource,
    ]);
}


    public function showInsideModule($courseId, $moduleNumber)
{
    // Get ALL resources (lectures) for this module - not just one
    $resources = Resource::where('courseId', $courseId)
                        ->where('moduleNumber', $moduleNumber)
                        ->orderBy('lectureNumber')
                        ->get();

    $course = Courses::findOrFail($courseId);
    
    // Get the module quiz (one per module)
    $quiz = Quiz::where('course_id', $courseId)
                ->where('module_number', $moduleNumber)
                ->first();

    $questions = $quiz ? $quiz->questions()->with('options')->get() : collect();

    // Get module name from the first resource
    $moduleName = $resources->first()->moduleName ?? "Module {$moduleNumber}";
    $user = auth()->user();

    return view('Admin.inside_module', [
        'course' => $course,
        'quiz' => $quiz,
        'questions' => $questions,
        'moduleNumber' => $moduleNumber,
        'moduleName' => $moduleName,
        'resources' => $resources, // Changed from single $resource to multiple $resources
        'user' => $user,
    ]);
}
 
}
