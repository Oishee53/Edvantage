<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class LandingController extends Controller
{
public function showLanding()
{
    
    // Load average and count from ratings
    $courses = Courses::withAvg('ratings', 'score')   // gives ->ratings_avg_score
        ->withCount('ratings')                        // gives ->ratings_count
        ->latest()
        ->get();

    // Normalize field names so your Blade can use ->avg_rating / ->rating_count
    $courses->each(function ($c) {
        $c->avg_rating   = round((float) ($c->ratings_avg_score ?? 0), 2);
        $c->rating_count = (int) ($c->ratings_count ?? 0);
    });

    // Category bar
    $uniqueCategories = $courses->pluck('category')->filter()->unique();

    return response()
        ->view('landing', compact('courses', 'uniqueCategories'))
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
}


}