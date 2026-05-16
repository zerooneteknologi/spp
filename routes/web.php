<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\ResetPassword;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek', function () {
    return __('auth.failed');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('schools', App\Http\Controllers\SchoolController::class);
    Route::resource('academic-years', App\Http\Controllers\AcademicYearController::class);
});
