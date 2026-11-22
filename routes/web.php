<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/students', [StudentController::class, 'index']);


Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');
Route::resource('/courses', CourseController::class)->except(['show']);

Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');