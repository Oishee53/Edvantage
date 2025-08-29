<?php
namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Courses $course)
    {
        $data = $request->validate([
            'stars'  => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:2000',
        ]);

        // Optional: enforce enrollment before rating
        // abort_unless($course->students()->where('users.id', $request->user()->id)->exists(), 403);

        Rating::updateOrCreate(
            ['course_id' => $course->id, 'user_id' => $request->user()->id],
            ['score' => $data['stars'], 'comment' => $data['review'] ?? null]
        );

        return back()->with('success', 'Thanks for your rating!');
    }

    public function skip(Request $request, Courses $course)
    {
        if (class_exists(\App\Models\RatingDismissal::class)) {
            \App\Models\RatingDismissal::firstOrCreate([
                'course_id' => $course->id,
                'user_id'   => $request->user()->id,
            ]);
        }
        return back()->with('success', 'Okay, we’ll stop asking for this course.');
    }
}
