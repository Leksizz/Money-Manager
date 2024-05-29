<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    });
});

Route::post('/auth/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('auth.destroy');



