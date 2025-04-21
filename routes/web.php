<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LupaPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('BuildUp');

// Register
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
});

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
});

// Logout
Route::controller(LogoutController::class)->group(function () {
    Route::post('/logout', 'logout')->name('logout');
});

// Lupa Password
Route::controller(LupaPasswordController::class)->group(function () {
    Route::get('/lupa-password', 'showLupaPasswordForm')->name('lupa.password');
    Route::post('/lupa-password-send', 'sendOTP')->name('kirim.otp');
    Route::get('/lupa-password-new', 'showKonfirPasswordForm')->name('konfir.password');
    Route::post('/lupa-password-update', 'updatePassword')->name('perbarui.password');
});
