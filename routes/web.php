<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordConfirmController;
use App\Http\Controllers\BalanceController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Guest;
use App\Http\Middleware\Owner;
use App\Http\Middleware\EnsureEmailIsVerified;

Route::middleware([Authenticate::class, EnsureEmailIsVerified::class, Owner::class])->group(function () {
    Route::prefix('balance')->group(function () {
        Route::get('/{balance}', [BalanceController::class, 'show'])->name('balance.show');
    });
    Route::get('/{type}/period/{balance}', [BalanceController::class, 'period'])->name('balance.period');
    Route::prefix('/finance/{type}/')->group(function () {
        Route::post('/add/{balance}', [FinanceController::class, 'store'])->name('finance.store');
        Route::get('/{balance}', [FinanceController::class, 'show'])->name('finance.show');
    });
});

Route::middleware([Authenticate::class, 'password.confirm', Owner::class])->group(function () {
    Route::prefix('users')->group(function () {
        Route::resource('users', UserController::class);
    });
});

Route::middleware([Authenticate::class, EnsureEmailIsVerified::class])->group(function () {
    Route::prefix('news')->group(function () {
        Route::get('/index', [NewsController::class, 'index'])->name('news.index');
        Route::get('/show/{news}', [NewsController::class, 'show'])->name('news.show');
    });
});

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/confirm-password', [PasswordConfirmController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [PasswordConfirmController::class, 'store']);
    Route::post('/auth/logout', [AuthController::class, 'destroy'])->name('auth.destroy');
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'create'])->name('verification.verify');
    Route::prefix('email')->group(function () {
        Route::get('/verify', [VerifyEmailController::class, 'index'])
            ->name('verification.notice');
        Route::post('/verification-notification', [VerifyEmailController::class, 'store'])
            ->name('verification.send');
    });
});

Route::middleware(Guest::class)->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    });
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/password-reset/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/password-reset', [ResetPasswordController::class, 'store'])->name('password.store');
});

Route::middleware(Admin::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::patch('/update/{user}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/destroy/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
        Route::get('/news', [AdminController::class, 'news'])->name('admin.news');
        Route::get('/tags', [AdminController::class, 'tags'])->name('admin.tags');
    });
    Route::prefix('news')->group(function () {
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::get('/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');;
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');;
        Route::patch('/update/{news}', [NewsController::class, 'update'])->name('news.update');;
        Route::delete('/destroy/{news}', [NewsController::class, 'destroy'])->name('news.destroy');;
    });
    Route::resource('tags', TagController::class);
});


