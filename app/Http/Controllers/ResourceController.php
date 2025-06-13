<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
public function index($courseId) {
    $resources = Resource::where('courseId', $courseId)->get();
    $course = Courses::findOrFail($courseId);
    return view('Resources.view_video_pdf', compact('course','resources'));
}
public function showPdf($filename)
{
    $path = storage_path('app/private/lecture_notes/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'PDF not found.');
    }
    if (!Auth::check()) {
        abort(403, 'Unauthorized access.');
    }

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
}
public function checkExists(Request $request) {
    $exists = Resource::where('courseId', $request->course_id)
                      ->where('moduleId', $request->module_id)
                      ->exists();

    return response()->json(['exists' => $exists]);
}
public function insert(Request $request, $course_id, $module_id) {
    $request->validate([
        'video_url' => 'required|url',
        'lecture_note' => 'required|mimes:pdf|max:2048',
    ]);

    $pdfPath = $request->file('lecture_note')->store('lecture_notes');

    Resource::updateOrCreate(
        ['courseId' => $course_id, 'moduleId' => $module_id],
        ['videos' => $request->video_url, 'pdf' => $pdfPath]
    );

    return redirect('/admin_panel/manage_resources')->with('success', 'Resource saved successfully.');
}
public function destroy($course_id, $module_id) {
    $resource = Resource::where('courseId', $course_id)
                      ->where('moduleId', $module_id)
                      ->firstOrFail();
    $resource->delete();

    return redirect("/admin_panel/manage_resources/{$course_id}/view");
}
    
}
