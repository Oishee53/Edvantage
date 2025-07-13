<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $amount = $request->amount ?? 0;
        return view('User.checkout', compact('amount'));
    }

    public function makePayment(Request $request)
    {
        $response = Http::post('http://127.0.0.1:5100/api/v1/payment/card', [
            'app_name' => 'Edvantage',
            'service' => 'Course Purchase',
            'customer_email' => auth()->user()->email,
            'card_type' => $request->card_type,
            'card_holder_name' => $request->card_holder_name,
            'card_number' => $request->card_number,
            'expiryMonth' => $request->expiryMonth,
            'expiryYear' => $request->expiryYear,
            'cvv' => $request->cvv,
            'amount' => $request->amount,
            'currency' => 'USD',
        ]);

         if ($response->successful()) {
        // ✅ Perform Enrollment Here
        $enrollmentController = new EnrollmentController();
        $enrollmentController->checkout(); // Calls your method

        return redirect()->route('courses.all')->with('success', 'Payment successful! You are enrolled in your selected courses.');
    } else {

        return redirect()->route('checkout')->with('error', 'Payment failed. Please try again.');
    }
}
}