<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('BuildUp');

