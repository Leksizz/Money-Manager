<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordConfirmController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ExpenseController;

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
    Route::prefix('balance')->group(function () {
        Route::get('/period/{type}/{balance}', [BalanceController::class, 'period'])->name('balance.period');
        Route::get('/{balance}', [BalanceController::class, 'show'])->name('balance.show');
    });
});

Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/settings/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/confirm-password', [PasswordConfirmController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [PasswordConfirmController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('income')->group(function () {
        Route::get('/today/{balance}', [IncomeController::class, 'show'])->name('income.show');
        Route::get('/expense/{balance}', [ExpenseController::class, 'show'])->name('expense.show');
    });
});


require __DIR__ . '/auth.php';
