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
    // Load course with instructor
    $course = Courses::with('instructor')->findOrFail($id);
    $user = auth()->user();
    return view('courses.course_details', compact('course','user'));
}
 public function create()
{
    return view('courses.create_course');
}
public function viewAll()
{
    $courses = Courses::all();
    return view('courses.view_all_courses', compact('courses'));
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
    $user = auth()->user();
    if($user->role == 2)
        return redirect('/admin_panel/manage_courses')->with('success', 'Course deleted successfully');
    else
        return redirect('/instructor/manage_courses')->with('success', 'Course deleted successfully');
}
public function logged_in_search(Request $request)
{
    $searchTerm = $request->get('search');
    $user = auth()->user();
    
    if (empty($searchTerm)) {
        return redirect()->route('home');
    }
    
    $courses = Courses::where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                    ->paginate(12);
    
    $uniqueCategories = Courses::distinct()->pluck('category');

    return view('user.logged_in_search_results', compact('courses', 'user', 'searchTerm', 'uniqueCategories'));
}

public function guest_user_search(Request $request)
{
    $searchTerm = $request->get('search');
    
    
    if (empty($searchTerm)) {
        return redirect()->route('home');
    }
    
    $courses = Courses::where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                    ->paginate(12);
    
    $uniqueCategories = Courses::distinct()->pluck('category');

    return view('user.guest_user_search_results', compact('courses', 'searchTerm', 'uniqueCategories'));
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
