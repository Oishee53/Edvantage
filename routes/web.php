<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/homepage', function () {
    $user = auth()->user();
    return view('homepage',compact('user')); 
})->middleware('auth');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');



Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::get('/courses/enrolled', function () {
    return 'Enrolled courses page coming soon!';
});

Route::get('/courses/all', function () {
    return 'All available courses page coming soon!';
});
