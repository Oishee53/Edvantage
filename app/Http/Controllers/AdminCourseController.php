<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class AdminCourseController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $courses = Courses::query()
            ->select('id','title','description','category','image','video_count','approx_video_length','total_duration','price','created_at')
            ->when($q !== '', function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%");
                // If you also want to search category/description, add:
                // ->orWhere('category', 'like', "%{$q}%")
                // ->orWhere('description', 'like', "%{$q}%");
            })
            ->orderByDesc('created_at')
            ->get();

        return view('courses.manage_courses', compact('courses'));
    }
}
