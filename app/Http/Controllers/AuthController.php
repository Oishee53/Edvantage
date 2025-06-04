<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    // Show login form
    public function showLogin()
    {
        return view('auth.login');  // refers to resources/views/auth/login.blade.php
    }

    // Handle login submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');  // you can change this to your homepage/dashboard
        }

        return back()->with('error', 'Invalid email or password.');
    }
}


