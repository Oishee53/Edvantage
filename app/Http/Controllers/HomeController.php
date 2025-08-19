<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q'); // Get the search query
        $coursesQuery = Courses::query();
        $category = $request->query('category');
        $sort = $request->query('sort');

        if ($q) {
            $coursesQuery->where('title', 'like', '%' . $q . '%');
        }
        if ($category) {
        $coursesQuery->where('category', $category);
    }
    switch ($sort) {
        case 'price_asc':
            $coursesQuery->orderBy('price', 'asc');
            break;
        case 'price_desc':
            $coursesQuery->orderBy('price', 'desc');
            break;
       
        default:
            $coursesQuery->orderBy('created_at', 'desc'); // newest first
    }

        $courses = $coursesQuery->get();

        $uniqueCategories = Courses::distinct()->pluck('category');
        $user = auth()->user();

        return view('homepage', compact('courses', 'uniqueCategories', 'user'));
    }
}
