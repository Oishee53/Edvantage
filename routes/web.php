<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {

    return view('landing');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');



Route::middleware(['auth.custom'])->group(function () {

Route::get('/homepage', function () {
    $user = auth()->user();
    return view('homepage',compact('user')); 
});

Route::get('/profile', [UserController::class, 'profile'])->name('profile');


Route::get('/courses/enrolled', function () {
    return 'Enrolled courses page coming soon!';
});

Route::get('/courses',[CourseController::class, 'viewCourses'])->name('courses.all');;
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.details');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.all');
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.all');
Route::post('/wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/wishlist/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::post('/enroll/{id}', [EnrollmentController::class, 'enroll'])->middleware('auth')->name('enroll');


});