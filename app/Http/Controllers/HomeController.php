<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class HomeController extends Controller
{
    public function index(Request $request){
   
    $q = trim((string) $request->query('q', ''));

    $uniqueCategories = Courses::query()
        ->whereNotNull('category')
        ->where('category', '!=', '')
        ->distinct()
        ->orderBy('category')
        ->pluck('category');

    $courses = Courses::query()
        ->select('id','title','price','image','category','created_at')
        ->when($q !== '', fn ($qb) => $qb->where('title', 'like', "%{$q}%"))
        ->orderByDesc('created_at')
        ->get();

    return view('homepage', [        // or 'user.homepage' if that’s your path
        'courses'          => $courses,
        'uniqueCategories' => $uniqueCategories,
        'user'             => auth()->user(),
        'q'                => $q,
    ]);
}
}
