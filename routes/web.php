<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\InputCPBController;

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
