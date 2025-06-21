<?php

namespace App\Http\Controllers;


use App\Models\Courses;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
public function showVideo($filename)
{
    $path = storage_path('app/private/lecture_videos/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'Video not found.');
    }
    if (!Auth::check()) {
        abort(403, 'Unauthorized access.');
    }

    $mimeType = $this->getVideoMimeType($filename);
    return response()->file($path, [
        'Content-Type' => $mimeType,
        'Content-Disposition' => 'inline; filename="' . $filename . '"'
    ]);
}

private function getVideoMimeType($filename)
{
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    return match(strtolower($extension)) {
    'mp4'  => 'video/mp4',
    'avi'  => 'video/x-msvideo',
    'mov'  => 'video/quicktime',
    'webm' => 'video/webm',
    'mkv'  => 'video/x-matroska',
    'flv'  => 'video/x-flv',
    default => 'video/mp4'
    };
}
public function checkExists(Request $request) {
    $exists = Resource::where('courseId', $request->course_id)
                      ->where('moduleId', $request->module_id)
                      ->exists();

    return response()->json(['exists' => $exists]);
}
public function insert(Request $request, $course_id, $module_id) {
    $request->validate([
        'video' => 'required|string', // Now it's a path, not a file
        'lecture_note' => 'required|mimes:pdf|max:2048',
    ]);

    $pdfPath = $request->file('lecture_note')->store('lecture_notes');
    $videoPath = $request->video; // From hidden input

    Resource::updateOrCreate(
        ['courseId' => $course_id, 'moduleId' => $module_id],
        ['videos' => $videoPath, 'pdf' => $pdfPath]
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

public function uploadChunk(Request $request)
{
    $file = $request->file('file');
    $filename = $request->input('resumableFilename');
    $identifier = $request->input('resumableIdentifier');
    $chunkNumber = $request->input('resumableChunkNumber');

    $tempDir = storage_path('app/chunks/' . $identifier);
    $chunkFile = $tempDir . '/chunk.' . $chunkNumber;

    if (!file_exists($tempDir)) {
        mkdir($tempDir, 0777, true);
    }

    $file->move($tempDir, 'chunk.' . $chunkNumber);

    $totalChunks = $request->input('resumableTotalChunks');
    $allChunksExist = true;
    for ($i = 1; $i <= $totalChunks; $i++) {
        if (!file_exists($tempDir . '/chunk.' . $i)) {
            $allChunksExist = false;
            break;
        }
    }

    if ($allChunksExist) {
        $finalPath = 'lecture_videos/' . time() . '-' . $filename;
        $finalFullPath = storage_path('app/private/' . $finalPath);
        $out = fopen($finalFullPath, 'ab');

        for ($i = 1; $i <= $totalChunks; $i++) {
            $in = fopen($tempDir . '/chunk.' . $i, 'rb');
            stream_copy_to_stream($in, $out);
            fclose($in);
        }

        fclose($out);
        File::deleteDirectory($tempDir);

        return response()->json(['filePath' => $finalPath]);
    }

    return response()->json(['chunk' => $chunkNumber]);
}
 public function assembleChunks(Request $request)
    {
        $identifier = $request->input('identifier');
        $filename = $request->input('filename');

        $chunkPath = storage_path('app/chunks/' . $identifier);
        $finalPath = storage_path('app/private/lecture_videos/' . $filename);

        $out = fopen($finalPath, "ab");
        $chunkNumber = 1;

        while (file_exists($chunkPath . '/chunk.' . $chunkNumber)) {
            $in = fopen($chunkPath . '/chunk.' . $chunkNumber, "rb");
            stream_copy_to_stream($in, $out);
            fclose($in);
            $chunkNumber++;
        }

        fclose($out);
        File::deleteDirectory($chunkPath);

        return response()->json(['file' => $finalPath]);
    }

    
}
