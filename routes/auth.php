<?php
//
//use App\Http\Controllers\AuthController;
//use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\Guest;
//use App\Http\Middleware\Authenticate;
//
////Route::middleware(Guest::class)->group(function () {
//    Route::prefix('auth')->group(function () {
//        Route::get('/register', [AuthController::class, 'create'])->name('auth.create');
//        Route::get('/login', [AuthController::class, 'index'])->name('login');
//        Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
//        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
//    });
////});
//
//Route::post('/auth/logout', [AuthController::class, 'destroy'])
//    ->middleware(Authenticate::class)
//    ->name('auth.destroy');
//
//
//
