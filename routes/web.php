<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Petugas\InputCPBController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LupaPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('petugas')->group(function () {
        // CPB input
        Route::get('/inputCPB', [InputCPBController::class, 'showFormInpuCPB'])->name('petugas.inputcpb');
        Route::get('/cpb/cetak-surat/{id}', [InputCPBController::class, 'cetakSurat'])->name('cpb.cetakSurat');
        Route::post('/tambahCPB', [InputCPBController::class, 'inputCPB'])->name('petugas.create.inputcpb');
        Route::get('/cpb/edit/{id}', [InputCPBController::class, 'showEditCPB'])->name('petugas.edit.cpb');
        Route::post('/cpb/update/{id}', [InputCPBController::class, 'updateCPB'])->name('petugas.update.cpb');
        Route::delete('/cpb/delete/{id}', [InputCPBController::class, 'deleteCPB'])->name('petugas.delete.cpb');
});
