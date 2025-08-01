<?php

use App\Models\Courses;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\QuizController;
use App\Models\Enrollment;

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


Route::get('/admin_panel/courses/{course}/modules/{module}/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
Route::post('/courses/{course}/modules/{module}/quizzes', [QuizController::class, 'store'])->name('quiz.store');




Route::get('/admin_panel/manage_resources/add', [ResourceController::class,'viewCourses']);
Route::get('/admin_panel/manage_resources/{course_id}/modules', [ResourceController::class, 'showModules'])->name('modules.show');




Route::get('/admin_panel/manage_user/view_enrolled_student', [StudentController::class, 'enrolledStudents']);
Route::get('/admin_panel/manage_user/view_all_student', [StudentController::class, 'allStudents']);

Route::delete('/admin_panel/manage_user/unenroll_student/{course_id}/{student_id}', [StudentController::class, 'destroy']);
