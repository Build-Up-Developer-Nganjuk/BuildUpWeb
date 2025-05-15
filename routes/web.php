<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LupaPasswordController;

Route::get('/', function () {
    return view('welcome');
});

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

Route::middleware(['auth', 'checkRole'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Profile
        Route::get('/profile', [ProfileController::class, 'showProfile'])->name('admin.profile');
        Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');

        // Jadwal
        Route::get('/jadwal', [JadwalController::class, 'showJadwal'])->name('admin.jadwal');
        Route::get('/jadwal/add', [JadwalController::class, 'showAddJadwal'])->name('admin.add.jadwal');
        Route::post('/jadwal/store', [JadwalController::class, 'AddJadwal'])->name('admin.store.jadwal');
        Route::get('/jadwal/edit/{id}', [JadwalController::class, 'showEditJadwal'])->name('admin.edit.jadwal');
        Route::put('/jadwal/update/{id}', [JadwalController::class, 'updateJadwal'])->name('admin.update.jadwal');
        Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'deleteJadwal'])->name('admin.delete.jadwal');
    });
});
