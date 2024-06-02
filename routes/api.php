<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\IncomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

// Route::apiResource('users', UserController::class);

Route::prefix('income')->group(function () {
    Route::get('/today/{balance}', [IncomeController::class, 'today'])->name('income.today');
    Route::get('/week/{balance}', [IncomeController::class, 'week'])->name('income.week');
    Route::get('/month/{balance}', [IncomeController::class, 'month'])->name('income.month');
    Route::get('/year/{balance}', [IncomeController::class, 'year'])->name('income.year');
    Route::get('/all/{balance}', [IncomeController::class, 'all'])->name('income.all');
    Route::post('/period/{balance}', [IncomeController::class, 'period'])->name('income.period');
});



