<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
 public function register(Request $request)
    {
        $request->validate([
            'expertise' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'video_editing_skill' => 'required|string',
            'target_audience' => 'required|string',
            'bio' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // exclude both _token and profile_picture
        $signupData = $request->except(['_token', 'profile_image']);

        // Handle file upload and save path
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('instructors', 'public');
            $signupData['profile_image'] = $path; // match DB column
        }

        // Save everything (including picture path) in session
        session(['instructor_signup' => $signupData]);

        // Redirect to payout form
        return view('Instructor.payment_setup');
    }

    // Step 2: Save payout and final instructor record
    public function savePaymentSetup(Request $request)
    {
       $validated = $request->validate([
            'card_type' => 'required|in:visa,mastercard',
            'cardholder_name' => 'required|string|max:255',
            'card_number' => 'required|digits:16',
            'expiry_month' => 'required|integer|min:1|max:12',
            'expiry_year' => 'required|integer|min:2024|max:2050',
            'cvv' => 'required|digits:3',
            'bank_name' => 'nullable|string|max:255',
        ]);
        $validated['expiry_date'] = $validated['expiry_month'] . '/' . $validated['expiry_year'];
        unset($validated['expiry_month'], $validated['expiry_year']);

        $signupData = session('instructor_signup');
        $user = Auth::user();

        User::where('id', $user->id)->update([
            'role' => 3,
        ]);

        // Merge signup + payout details
        $data = array_merge($signupData, $validated);

        $data['user_id'] = auth()->id(); // link to student account

        Instructor::create($data);

        // Clear session
        session()->forget('instructor_signup');

        return redirect('/instructor_homepage')->with('success', 'Instructor account created successfully!');
    }
}
