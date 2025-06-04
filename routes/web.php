<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

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

Route::get('/courses',[CourseController::class, 'viewCourses'])->name('courses.all');;

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.details');

Route::post('/cart/{id}', [CartController::class, 'add'])->name('cart.add');

Route::post('/wishlist/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
