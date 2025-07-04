<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
   

public function viewCourses()
{
    $courses = Courses::all();
    $uniqueCategories = $courses->pluck('category')->unique();
    return view('courses.all_courses', compact('courses','uniqueCategories'));
}


public function show($id)
{
    $course = Courses::findOrFail($id);
    return view('courses.course_details', compact('course'));
}
 public function create()
{
    return view('courses.create_course');
}
public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'required',
        'description' => 'nullable',
        'category' => 'required|string',
        'video_count' => 'required|integer',
        'approx_video_length' => 'required|integer',
        'total_duration' => 'required|numeric',
        'price' => 'required|numeric',
    ]);
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('course_images', 'public');
    }

    Courses::create([
        'image' => $imagePath ?? null,
        'title' => $request->title,
        'description' => $request->description,
        'category' => $request->category,
        'video_count' => $request->video_count,
        'approx_video_length' => $request->approx_video_length,
        'total_duration' => $request->total_duration,
        'price' => $request->price,
    ]);

    return redirect('/admin_panel/manage_courses')->with('success', 'Course added successfully!');
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
public function destroy(Request $request){
    $request->validate([
        'title' => 'required',
    ]);
    $course = Courses::where('title', $request->title)->firstOrFail();
    $course->delete();

    return redirect('/admin_panel/manage_courses/delete-course');
    
}
public function editList()
{
    $courses = Courses::all();
    return view('courses.course_list', compact('courses'));
}
public function editCourse($id)
{
    $course = Courses::findOrFail($id);
    return view('courses.edit_course', compact('course'));
}
public function update(Request $request, $id) 
{
    $course = Courses::findOrFail($id);
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
    
    return redirect('/admin_panel/manage_courses/edit-list')
           ->with('success', 'Course updated successfully!');
}


}
