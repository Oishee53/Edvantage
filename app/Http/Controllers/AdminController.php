<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function showLoginForm()
{
    return view('Admin.admin_login');
}
public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 2;

        if (Auth::attempt($credentials)) {
            return redirect('/admin_panel'); 
        }

        return back()->with('error', 'Invalid email or password.');
    }
 public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
       return redirect('/');
    }


}
