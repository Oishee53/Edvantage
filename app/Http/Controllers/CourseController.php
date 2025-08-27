<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\PendingCourses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
   

public function viewCourses()
{
    $courses = Courses::all();
    $user = auth()->user();
    $uniqueCategories = $courses->pluck('category')->unique();
    return view('courses.all_courses', compact('user','courses','uniqueCategories'));
}


public function show($id)
{
    $course = Courses::findOrFail($id);
    $user = auth()->user();
    return view('courses.course_details', compact('course','user'));
}
 public function create()
{
    return view('courses.create_course');
}
public function store(Request $request)
{
    $user = auth()->user();

    // Validation rules
    $rules = [
    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    'title' => 'required',
    'description' => 'nullable',
    'category' => 'required|string',
    'video_count' => 'required|integer',
    'approx_video_length' => 'required|integer',
    'total_duration' => 'required|numeric',
    'price' => 'required|numeric',
    'prerequisite' => 'nullable|string|max:255',
];

    if ($user->role === 2) {
        $rules['instructor_id'] = 'required|exists:users,id';
    }

    $request->validate($rules);
    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('course_images', 'public');
    }
    // Determine instructor ID
    $instructorId = $user->id;

    // Create the course
    Courses::create([
        'image' => $imagePath ?? null,
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'video_count' => $request->video_count,
        'approx_video_length' => $request->approx_video_length,
        'total_duration' => $request->total_duration,
        'price' => $request->price,
        'instructor_id' => $instructorId,
        'prerequisite' => $request->prerequisite,
    ]);
   return match($user->role) {
        2 => redirect('/admin_panel/manage_courses')->with('success', 'Course added successfully!'),
        3 => redirect('/instructor/manage_courses')->with('success', 'Course added successfully!'),
        default => redirect('/')->with('info', 'Course added.'),
    };
}

public function viewAll()
{
    $courses = Courses::all();
    return view('courses.view_all_courses', compact('courses'));
}
public function deleteCourse()
{
    $courses = Courses::all();
    return view('courses.delete_course', compact('courses'));
}
public function destroy($id)
{
    // Try to find in Courses
    $course = Courses::find($id);

    // If not found, try PendingCourses
    if (!$course) {
        $course = PendingCourses::findOrFail($id);
    }

    $course->delete();

    return redirect('/admin_panel/manage_courses')->with('success', 'Course deleted successfully');
}

public function editList()
{
    $courses = Courses::all();
    return view('courses.course_list', compact('courses'));
}
public function editCourse($id)
{
    $course = Courses::find($id) ?? PendingCourses::findOrFail($id);
    return view('courses.edit_course', compact('course'));
}
public function update(Request $request, $id) 
{
    $course = Courses::find($id) ?? PendingCourses::findOrFail($id);
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category' => 'required|string',
        'video_count' => 'required|integer|min:1',
        'approx_video_length' => 'required|integer|min:1',
        'total_duration' => 'required|numeric|min:0.1',
        'price' => 'required|numeric|min:0',
    ]);
    
    $updateData = [
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'video_count' => $request->video_count,
        'approx_video_length' => $request->approx_video_length,
        'total_duration' => $request->total_duration,
        'price' => $request->price,
    ];
    
    if ($request->hasFile('image')) {
        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }
        $updateData['image'] = $request->file('image')->store('course_images', 'public');
    }
    $course->update($updateData);
    $user = auth()->user();
    if ($user->role === 2) {
    return redirect('/admin_panel/manage_courses')
           ->with('success', 'Course updated successfully!');}
    elseif ($user->role === 3) {
    return redirect('/instructor/manage_courses')
           ->with('success', 'Course updated successfully!');}
}


}
