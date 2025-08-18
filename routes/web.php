<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserQuizController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\VideoProgressController;
use App\Http\Controllers\UserProgressController;

use Illuminate\Validation\Rules;
use App\Models\Courses;
Route::get('/', [LandingController::class, 'showLanding']);

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');



Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.details');



// ----------------------------- Forget Password --------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::post('forget-password', 'sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'showLinkRequestForm');
});



// ---------------------------- Reset Password ----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'updatePassword')->name('password.update');
    
});












Route::middleware('block-login')->group(function () {
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/guest/cart/add', [CartController::class, 'addToGuestCart'])->name('cart.guest.add');
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.all');

Route::middleware(['auth.custom'])->group(function () {

Route::get('/homepage', function () {
    $user = auth()->user();
    $courses = Courses::all(); 
    $uniqueCategories = $courses->pluck('category')->unique();
    return view('homepage',compact('user','courses','uniqueCategories')); 
});

Route::get('/profile', [UserController::class, 'profile'])->name('profile');


Route::get('/courses/enrolled', function () {
    return 'Enrolled courses page coming soon!';
});

Route::get('/courses',[CourseController::class, 'viewCourses'])->name('courses.all');;





Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.all');
Route::post('/wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/wishlist/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');



Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::post('/make-payment', [PaymentController::class, 'makePayment'])->name('make.payment');

Route::get('/my-courses', [EnrollmentController::class, 'userEnrolledCourses'])->name('courses.enrolled');
Route::get('/my-courses/{courseId}', [EnrollmentController::class, 'viewCourseModules'])->name('user.course.modules');
Route::get('/my-courses/{courseId}/module/{moduleId}', [EnrollmentController::class, 'viewModuleResource'])->name('user.module.resource');
Route::get('/pdf/view/{id}', [EnrollmentController::class, 'viewPDF'])
    ->name('secure.pdf.view')
    ->middleware('auth');



Route::get('/my-courses', [EnrollmentController::class, 'userEnrolledCourses'])->name('courses.enrolled');
Route::get('/my-courses/{courseId}', [EnrollmentController::class, 'viewCourseModules'])->name('user.course.modules');
Route::get('/my-courses/{courseId}/module/{moduleId}', [EnrollmentController::class, 'viewModuleResource'])->name('user.module.resource');
Route::get('/inside-module/{courseId}/{moduleNumber}', [EnrollmentController::class, 'showInsideModule'])->name('inside.module');




// Show quiz start page for a module
Route::get('/user/courses/{course}/modules/{module}/quiz', [UserQuizController::class, 'startQuiz'])->name('user.quiz.start');




Route::post('/quiz/submit/{course}/{moduleNumber}', [UserQuizController::class, 'submitQuiz'])->name('user.quiz.submit');
Route::get('/quiz/result/{course}/{moduleNumber}', [UserQuizController::class, 'result'])->name('user.quiz.result');



Route::post('/video-progress/save', [VideoProgressController::class, 'save'])->name('video.progress.save');

Route::get('/my-progress', [UserProgressController::class, 'index'])->name('user.progress');

Route::get('/purchase-history', [EnrollmentController::class, 'purchaseHistory'])->name('purchase.history');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin_panel/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
});