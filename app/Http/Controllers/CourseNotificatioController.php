<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\PendingCourses;
use App\Models\PendingResources;
use App\Models\CourseNotification;
use Illuminate\Support\Facades\DB;
use App\Notifications\editCourseNotification;
use App\Notifications\rejectCourseNotification;
use App\Notifications\approveCourseNotification;

class CourseNotificatioController extends Controller
{
     public function sendNotification($courseId)
{
    // find course
    $course = Courses::findOrFail($courseId);

    // update status
    Courses::where('id', $course->id)->update([
        'status' => 'pending'
    ]);

    // (optional) create notification entry in another table if needed
    return redirect('/instructor_homepage')
        ->with('success', 'Course submitted for review successfully.');
}

     public function index()
    {
        $pendingCourses = Courses::where('status', 'pending')->get();

        return view('admin.pending_courses', compact('pendingCourses'));
    }
    public function review(Courses $course)
{
    // Load all modules + their resources
    $modules = $course->modules()->with('materials')->get();

    return view('admin.submitted_courses.review', compact('course', 'modules'));
}
    public function show_modules($course_id)
    {
    $course = Courses::findOrFail($course_id);

    $modules = range(1, $course->module);
    $user = auth()->user(); 
    return view('Admin.show_modules', compact('course', 'modules','user'));
    }
    public function approve($course_id)
{
    $course = Courses::findOrFail($course_id); // get the model
    $course->status = 'approved';
    $course->save();

    $instructor = $course->instructor; // now works

    // Send approval notification (optional)
    if ($instructor) {
        $instructor->notify(new approveCourseNotification($course));
    }

    return redirect('/pending-courses')->with('success', 'Course approved and moved to main courses.');
}

    // Reject a course
   public function reject(Request $request, $course_id)
{
    $request->validate([
        'rejection_message' => 'required|string|max:1000',
    ]);
    $resources = Resource::where('courseId', $course_id)->get();

    foreach ($resources as $resource) {
        $resource->delete();
    }


    DB::transaction(function () use ($course_id, $request) {
        // Find course
        $course = Courses::findOrFail($course_id);
        
        // Update status
        $course->update([
            'status' => 'rejected',
        ]);

        // Notify instructor
        $instructor = $course->instructor; // fetch related User model
        if ($instructor) {
            $instructor->notify(new rejectCourseNotification(
                $course, 
                $request->rejection_message
            ));
        }
    });

    return redirect('/pending-courses')
        ->with('success', 'Course has been rejected and instructor has been notified.');
}
public function askForEdit(Request $request, Courses $course)
{
    $request->validate([
        'edit_message' => 'required|string|max:1000'
    ]);
     $course->update([
            'status' => 'not submitted',
        ]);
    
    
    // Send notification to instructor
    $course->instructor->notify(new editCourseNotification(
        $course,
        $request->edit_message,
        auth()->user()->name
    ));
    
    return redirect()->back()->with('success', 'Edit request sent to instructor successfully!');
}
}
