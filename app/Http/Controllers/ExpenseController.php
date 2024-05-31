<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Services\BalanceService;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    private BalanceService $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function show(Balance $balance)
    {
        $balance = $this->balanceService->amount($balance);

        return view('balance.expense', compact('balance'));
    }
}
