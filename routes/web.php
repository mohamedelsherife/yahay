<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;


Route::get('/', [StudentController::class, 'index'])->name('students.index');

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');