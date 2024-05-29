<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

Route::middleware('auth')->group(function () {
    Route::prefix('email')->group(function () {
        Route::get('/verify', [VerifyEmailController::class, 'index'])
            ->name('verification.notice');
        Route::post('/verification-notification', [VerifyEmailController::class, 'store'])
            ->name('verification.send');
    });
});

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'create'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/password-reset/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/password-reset', [ResetPasswordController::class, 'store'])->name('password.store');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('users.index');
    });
});

require __DIR__ . '/auth.php';
