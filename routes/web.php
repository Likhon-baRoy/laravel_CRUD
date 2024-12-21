<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FrontendController;

Route::get('/', function () {
  return view('welcome');
});

// Student Routes
Route::get('/student', [ StudentController::class, 'index' ]) -> name('student.index');
Route::get('/student-create', [ StudentController::class, 'create' ]) -> name('student.create');
Route::get('/student-show/{username}', [ StudentController::class, 'show' ]) -> name('student.show');
Route::get('/student-destroy/{id}', [ StudentController::class, 'destroy' ]) -> name('student.destroy');
Route::get('/student-edit/{username}', [ StudentController::class, 'edit' ]) -> name('student.edit');

Route::post('/student-update/{username}', [ StudentController::class, 'update' ]) -> name('student.update');
Route::post('/student', [ StudentController::class, 'store' ]) -> name('student.store');

// Staff Routes
Route::resource('staff', StaffController::class);
