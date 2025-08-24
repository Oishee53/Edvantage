<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $q        = $request->query('q');
    $category = $request->query('category');
    $sort     = $request->query('sort');

    $coursesQuery = Courses::query()
        ->withAvg('ratings', 'score')   // gives ->ratings_avg_score
        ->withCount('ratings');         // gives ->ratings_count

    if ($q) {
        $coursesQuery->where('title', 'like', '%'.$q.'%');
    }
    if ($category) {
        $coursesQuery->where('category', $category);
    }

    switch ($sort) {
        case 'price_asc':  $coursesQuery->orderBy('price', 'asc');  break;
        case 'price_desc': $coursesQuery->orderBy('price', 'desc'); break;
        default:           $coursesQuery->orderBy('created_at', 'desc');
    }

    $courses = $coursesQuery->get();

    // Normalize field names so your Blade can keep using avg_rating & rating_count
    $courses->each(function ($c) {
        $c->avg_rating   = round((float)($c->ratings_avg_score ?? 0), 2);
        $c->rating_count = (int)($c->ratings_count ?? 0);
    });

    $uniqueCategories = Courses::whereNotNull('category')->distinct()->pluck('category');
    $user = auth()->user();

    return view('homepage', compact('courses','uniqueCategories','user'));
}

}
