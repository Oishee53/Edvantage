<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
            return redirect('/homepage'); 
        }

        return back()->with('error', 'Invalid email or password.');
    }
    public function showRegister()
    {
        return view ('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone'=>'required',
        'password' => 'required|min:5|confirmed',
        'field' => 'nullable|string|max:255',
        
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone'=>$request->phone,
        'password' => Hash::make($request->password),
        'field' => $request->field,
       
    ]);

    Auth::login($user);

    return redirect('/homepage')->with('success', 'Account created! Please login.');
}


}


