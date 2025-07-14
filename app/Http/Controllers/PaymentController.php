<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cart;
use App\Http\Controllers\EnrollmentController; // Import EnrollmentController

class PaymentController extends Controller
{

    public function checkout(Request $request)
    {
        $amount = $request->amount ?? 0;
        return view('User.checkout', compact('amount'));
    }

    public function makePayment(Request $request)
{
    $user = auth()->user();
    $amount = $request->amount;

    // ✅ STEP 1: Get course details from cart
    $cartItems = Cart::where('user_id', $user->id)->get();

    $courseDetails = $cartItems->map(function ($item) {
        return [
            'title' => $item->course->title,
            'unit_price' => $item->course->price,
        ];
    })->values()->toArray(); // ✅ Convert to clean array

    // ✅ STEP 2: Send data to fake payment API
    $response = Http::post('http://localhost:5100/api/v1/payment/card', [
        'amount' => $amount,
        'card_type' => $request->card_type,
        'card_holder_name' => $request->card_holder_name,
        'card_number' => $request->card_number,
        'expiryMonth' => $request->expiryMonth,
        'expiryYear' => $request->expiryYear,
        'cvv' => $request->cvv,
        'customer_email' => $user->email,
        'app_name' => 'Edvantage',
        'service' => 'Course Purchase',
        'courses' => $courseDetails, // ✅ Correct key and data format
        'total' => $amount, // ✅ Also send total if needed by Node.js
    ]);

    // ✅ STEP 3: Handle response
    if ($response->successful()) {
        // Perform Enrollment
        $enrollmentController = new EnrollmentController();
        $enrollmentController->checkout();

        return redirect()->route('courses.all')->with('success', 'Payment successful! You are enrolled in your selected courses.');
    } else {
        return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
    }
}
}