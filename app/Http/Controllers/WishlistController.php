<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Wishlist;

class WishlistController extends Controller
{
   public function addToWishlist($courseId)
{
    // Avoid duplicate entries
    $exists = Wishlist::where('user_id', auth()->id())
                  ->where('course_id', $courseId)
                  ->first();

    if (!$exists) {
        Wishlist::create([
            'user_id' => auth()->id(),
            'course_id' => $courseId,
        ]);
    }

    return redirect()->back()->with('success', 'Course added to wishlist.');
}

public function showWishlist()
{
    $WishlistItems = Wishlist::with('course')->where('user_id', auth()->id())->get();

    return view('user.wishlist', compact('WishlistItems'));
}
}
