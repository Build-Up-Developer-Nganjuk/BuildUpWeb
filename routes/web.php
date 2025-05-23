<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Petugas\PetugasProfileController;
use App\Http\Controllers\Petugas\GantiPasswordController;
use App\Http\Controllers\Admin\AdminGantiPasswordController;
use App\Http\Controllers\Petugas\InputCPBController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LupaPasswordController;

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

Route::middleware(['auth', 'checkRole'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'showDashboardAdmin'])->name('admin.dashboard');
        // Profile
        Route::get('/profile', [ProfileController::class, 'showProfile'])->name('admin.profile');
        Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
        Route::get('/ganti-password', [AdminGantiPasswordController::class, 'showChangePassword'])->name('admin.ganti.password');
        Route::post('/ganti-password-new', [AdminGantiPasswordController::class, 'ChangePassword'])->name('admin.update.password');

        // Jadwal
        Route::get('/jadwal', [JadwalController::class, 'showJadwal'])->name('admin.jadwal');
        Route::get('/jadwal/add', [JadwalController::class, 'showAddJadwal'])->name('admin.add.jadwal');
        Route::post('/jadwal/store', [JadwalController::class, 'AddJadwal'])->name('admin.store.jadwal');
        Route::get('/jadwal/edit/{id}', [JadwalController::class, 'showEditJadwal'])->name('admin.edit.jadwal');
        Route::put('/jadwal/update/{id}', [JadwalController::class, 'updateJadwal'])->name('admin.update.jadwal');
        Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'deleteJadwal'])->name('admin.delete.jadwal');

        // Data Verif
        Route::get('/data/verif/cpb', [DataController::class, 'showDataVerifCPB'])->name('admin.data_verif_cpb');
        Route::delete('/data/verif/cpb', [DataController::class, 'deleteDataVerifCPB'])->name('admin.delete.data_verif_cpb');
    });

    Route::prefix('petugas')->group(function () {
        // CPB input
        Route::get('/inputCPB', [InputCPBController::class, 'showFormInpuCPB'])->name('petugas.inputcpb');
        Route::get('/cpb/cetak-surat/{id}', [InputCPBController::class, 'cetakSurat'])->name('cpb.cetakSurat');
        Route::post('/tambahCPB', [InputCPBController::class, 'inputCPB'])->name('petugas.create.inputcpb');
        Route::get('/cpb/edit/{id}', [InputCPBController::class, 'showEditCPB'])->name('petugas.edit.cpb');
        Route::post('/cpb/update/{id}', [InputCPBController::class, 'updateCPB'])->name('petugas.update.cpb');
        Route::delete('/cpb/delete/{id}', [InputCPBController::class, 'deleteCPB'])->name('petugas.delete.cpb');
        // Profile
        Route::get('/profile', [PetugasProfileController::class, 'showPetugasProfile'])->name('petugas.profile');
        Route::put('/profile/update', [PetugasProfileController::class, 'updateProfile'])->name('petugas.profile.update');
        Route::get('/ganti-password', [GantiPasswordController::class, 'showChangePassword'])->name('petugas.ganti.password');
        Route::post('/ganti-password-new', [GantiPasswordController::class, 'ChangePassword'])->name('petugas.update.password');
    });
});
