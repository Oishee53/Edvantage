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
return response()
        ->view('auth.login') // or whatever your login view is
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }

    // Handle login submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 1;

        if (Auth::attempt($credentials)) {
            return redirect('/homepage'); 
        }

        return back()->with('error', 'Invalid email or password.');
    }

    
    public function showRegister()
    {
         return response()
        ->view('auth.register') // or your register view
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');             

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

   $user =  User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone'=>$request->phone,
        'password' => Hash::make($request->password),
        'field' => $request->field,
        'role' => User::ROLE_USER,
       
    ]);

    Auth::login($user);

    return redirect('/homepage')->with('success', 'Account created!');
}


}


