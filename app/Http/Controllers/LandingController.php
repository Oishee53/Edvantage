<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class LandingController extends Controller
{
    public function showLanding()
{
    $courses = Courses::all(); // Or any query you prefer
    return view('landing', compact('courses'));
}

}
