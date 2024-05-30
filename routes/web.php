<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/dashboard/{user}', [UserController::class, 'index'])->name('users.index');

    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/settings/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});


require __DIR__ . '/auth.php';
