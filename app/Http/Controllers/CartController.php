<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Courses;


class CartController extends Controller
{
    public function addToCart($courseId)
{
    // Avoid duplicate entries
    $exists = Cart::where('user_id', auth()->id())
                  ->where('course_id', $courseId)
                  ->first();

    if (!$exists) {
        Cart::create([
            'user_id' => auth()->id(),
            'course_id' => $courseId,
        ]);
    }

    return redirect()->back()->with('cart_added', 'Course added to cart.');

}

public function showCart()
{
    $cartItems = Cart::with('course')->where('user_id', auth()->id())->get();

    return view('user.cart', compact('cartItems'));
}

public function removeFromCart($id)
{
    $cartItem = Cart::where('id', $id)->where('user_id', auth()->id())->first();

    if ($cartItem) {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Course removed from cart.');
    }

    return redirect()->back()->with('error', 'Item not found or unauthorized.');
}


}
