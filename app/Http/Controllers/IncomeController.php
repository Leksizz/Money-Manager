<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Services\BalanceService;
use Illuminate\View\View;

class IncomeController extends Controller
{
    private BalanceService $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function show(Balance $balance): View
    {
        $balance = $this->balanceService->amount($balance);

        return view('balance.income', compact('balance'));
    }
}

