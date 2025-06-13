<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ResourceController;

Route::get('/admin', [AdminController::class, 'showLoginForm']);
Route::post('/admin/login', [AdminController::class, 'adminLogin']);

Route::get('/admin_panel', function () {
    return view('Admin.admin_panel');
});
Route::post('/logout', [AdminController::class, 'logout']);
Route::get('/admin_panel/manage_courses', function () {
    return view('courses.manage_courses');
});

Route::get('/admin_panel/manage_courses/add', [CourseController::class, 'create']);
Route::post('/admin_panel/manage_courses/create', [CourseController::class, 'store']);
Route::get('/admin_panel/manage_courses/view-list', [CourseController::class, 'viewAll']);
Route::get('/admin_panel/manage_courses/delete-course', [CourseController::class, 'deleteCourse']);
Route::post('/admin_panel/manage_courses/delete-course', [CourseController::class, 'destroy']);

Route::get('/admin_panel/manage_courses/edit-list', [CourseController::class,'editList']);
Route::get('admin/manage_courses/courses/{id}/edit', [CourseController::class, 'editCourse']);
Route::put('admin/manage_courses/courses/{id}/edit', [CourseController::class, 'update']);

Route::get('/admin_panel/manage_resources', function () {
    return view('Resources.manage_resources');
});

Route::get('/admin_panel/manage_resources/add', [ResourceController::class,'viewCourses']);
Route::get('/admin_panel/manage_resources/{course_id}/modules', [ResourceController::class, 'showModules']);

Route::get('/admin_panel/manage_resources/{course_id}/modules/{module_id}/edit', [ResourceController::class, 'editModule']);

Route::post('/admin_panel/manage_resources/{course_id}/module/{module_id}/add', [ResourceController::class, 'insert']);
Route::post('/admin_panel/manage_resources/{course_id}/module/{module_id}/delete', [ResourceController::class, 'destroy']);
Route::get('/admin_panel/manage_resources/view', [ResourceController::class,'viewPage']);
Route::get('/admin/pdf/{filename}', [ResourceController::class, 'showPdf'])->name('pdf.view');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_panel/manage_resources/{course_id}/view', [ResourceController::class, 'index']);
});

Route::post('/check-resource', [ResourceController::class, 'checkExists'])->name('check.resource.exists');


