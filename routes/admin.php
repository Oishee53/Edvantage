<?php

use App\Models\Courses;
use App\Models\Resource;
use MuxPhp\Models\Upload;
use App\Models\Enrollment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResourceController;

Route::post('/admin/login', [AdminController::class, 'adminLogin']);

Route::get('/admin_panel', function () {
    $totalStudents = User::where('role', 2)->count();
    $totalCourses =  Courses::all()->count();
    $totalEarn = Enrollment::with('course')->get()->sum('course.price'); 
    return view('Admin.admin_panel', compact('totalStudents','totalCourses','totalEarn'));
});
Route::post('/logout', [AdminController::class, 'logout']);
Route::get('/admin_panel/manage_courses', function () {
    $courses = Courses::all();
    return view('courses.manage_courses', compact('courses'));
});

Route::get('/admin_panel/manage_courses/add', [CourseController::class, 'create']);
Route::post('/admin_panel/manage_courses/create', [CourseController::class, 'store']);
Route::get('/admin_panel/manage_courses/view-list', [CourseController::class, 'viewAll']);
Route::get('/admin_panel/manage_courses/delete-course', [CourseController::class, 'deleteCourse']);
Route::delete('/admin_panel/manage_courses/delete-course/{id}', [CourseController::class, 'destroy']);

Route::get('/admin_panel/manage_courses/edit-list', [CourseController::class,'editList']);
Route::get('admin/manage_courses/courses/{id}/edit', [CourseController::class, 'editCourse']);
Route::put('admin/manage_courses/courses/{id}/edit', [CourseController::class, 'update']);

Route::get('/admin_panel/manage_resources', function () {
    return view('Resources.manage_resources');
});
Route::get('/admin_panel/manage_user', function () {
    return view('Student.manage_student');
});

Route::get('/admin_panel/manage_resources/add', [ResourceController::class,'viewCourses']);
Route::get('/admin_panel/manage_resources/{course_id}/modules', [ResourceController::class, 'showModules']);
Route::get('/admin_panel/manage_resources/{course_id}/modules/{module_id}/edit', [ResourceController::class, 'editModule']);
Route::post('/resources/{course_id}/modules/{module_id}/upload', [UploadController::class, 'handleUpload'])->name('upload.resources');



Route::get('/admin_panel/manage_user/view_enrolled_student', [StudentController::class, 'enrolledStudents']);
Route::get('/admin_panel/manage_user/view_all_student', [StudentController::class, 'allStudents']);

Route::delete('/admin_panel/manage_user/unenroll_student/{course_id}/{student_id}', [StudentController::class, 'destroy']);

Route::get('/admin/upload', function() {
    return view('Resources.upload');
})->name('admin.upload.form');

Route::get('/admin/cloud', function() {
    return view('Resources.uploadToCloud');
});

Route::get('/admin/view', function() {
    return view('Resources.viewVideo');
});

Route::post('/admin/upload', [VideoController::class, 'upload'])->name('admin.upload');

Route::post('/admin/cloud', [VideoController::class, 'uploadToCloudinary'])->name('upload.cloudinary');

Route::post('/admin/mux-upload-url', [VideoController::class, 'getUploadUrl'])->name('mux.direct.upload.url');



