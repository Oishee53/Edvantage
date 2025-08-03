<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoProgress;
use Illuminate\Support\Facades\Auth;
use App\Models\Resource;
use App\Models\Courses;
use App\Models\User;



class VideoProgressController extends Controller
{
    public function save(Request $request)
{
   $request->validate([
    'course_id' => 'required|exists:courses,id',
    'resource_id' => 'required|exists:resources,id',
    'progress_percent' => 'required|numeric|min:0|max:100',
]);

$userId = auth()->id();

VideoProgress::updateOrCreate(
    [
        'user_id' => $userId,
        'course_id' => $request->course_id,
        'resource_id' => $request->resource_id,
    ],
    [
        'progress_percent' => $request->progress_percent,
        'is_completed' => $request->progress_percent >= 100,
    ]
);


    return response()->json(['success' => true]);
}

}


