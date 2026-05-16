<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClassroomController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek', function () {
    return __('auth.failed');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('schools', App\Http\Controllers\SchoolController::class);
    Route::resource('academic-years', App\Http\Controllers\AcademicYearController::class);
    Route::resource('dsp-plans', App\Http\Controllers\DspPlanController::class);
    Route::resource('classroom', ClassroomController::class);
});
