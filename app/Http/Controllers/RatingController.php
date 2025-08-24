<?php
namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    // POST /courses/{course}/rate
    public function store(Request $req, Courses $course)
    {
        $req->validate([
            'score'   => ['required','integer','min:1','max:5'],
            'comment' => ['nullable','string','max:2000'],
        ]);

        $user = $req->user();

        // Ensure the user is enrolled in this course
        $isEnrolled = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->exists();
        if (!$isEnrolled) {
            return back()->with('error','You must be enrolled to rate this course.');
        }

        DB::transaction(function() use ($req, $user, $course) {
            Rating::updateOrCreate(
                ['course_id'=>$course->id,'user_id'=>$user->id],
                ['score'=>$req->integer('score'), 'comment'=>$req->input('comment')]
            );

            // Recompute and cache
            $agg = Rating::forCourse($course->id)
                ->selectRaw('COUNT(*) as c, AVG(score) as a')->first();

            $course->update([
                'rating_count' => (int) $agg->c,
                'avg_rating'   => round((float) $agg->a, 2),
            ]);
        });

        return back()->with('success','Thanks for rating!');
    }

    // Optional: POST /courses/{course}/rate/skip
    public function skip(Request $req, Courses $course)
    {
        // If you created the rating_dismissals table, you can persist the skip like this:
        if (class_exists(\App\Models\RatingDismissal::class)) {
            \App\Models\RatingDismissal::firstOrCreate([
                'course_id' => $course->id,
                'user_id'   => $req->user()->id,
            ]);
        }
        return back()->with('info','Skipped. You can rate later from Progress.');
    }
}
