<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Petugas\PetugasProfileController;
use App\Http\Controllers\Petugas\GantiPasswordController;
use App\Http\Controllers\Admin\AdminGantiPasswordController;

Route::get('/', function () {
    return view('welcome');
});

 // Profile
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('admin.profile');
Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
Route::get('/ganti-password', [AdminGantiPasswordController::class, 'showChangePassword'])->name('admin.ganti.password');
Route::post('/ganti-password-new', [AdminGantiPasswordController::class, 'ChangePassword'])->name('admin.update.password');

 // Profile
Route::get('/profile', [PetugasProfileController::class, 'showPetugasProfile'])->name('petugas.profile');
Route::put('/profile/update', [PetugasProfileController::class, 'updateProfile'])->name('petugas.profile.update');
Route::get('/ganti-password', [GantiPasswordController::class, 'showChangePassword'])->name('petugas.ganti.password');
Route::post('/ganti-password-new', [GantiPasswordController::class, 'ChangePassword'])->name('petugas.update.password');