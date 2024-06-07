<?php

use App\Http\Controllers\Api\FinanceController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('users', UserController::class);

Route::middleware('owner')->group(function () {
    Route::prefix('{type}')->group(function () {
        Route::get('/today/{balance}', [FinanceController::class, 'today'])->name('finance.today');
        Route::get('/week/{balance}', [FinanceController::class, 'week'])->name('finance.week');
        Route::get('/month/{balance}', [FinanceController::class, 'month'])->name('finance.month');
        Route::get('/year/{balance}', [FinanceController::class, 'year'])->name('finance.year');
        Route::get('/all/{balance}', [FinanceController::class, 'all'])->name('finance.all');
        Route::post('/period/{balance}', [FinanceController::class, 'period'])->name('finance.period');
    });
});


Route::get('/statistic/{balance}', [FinanceController::class, 'statistic'])->name('finance.statistic')->middleware('owner');



