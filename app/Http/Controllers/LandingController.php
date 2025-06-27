<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class LandingController extends Controller
{
    public function showLanding()
{   
    $courses = Courses::all();
    
    $uniqueCategories = $courses->pluck('category')->unique();
    return view('landing', compact('courses', 'uniqueCategories'));
}

}
