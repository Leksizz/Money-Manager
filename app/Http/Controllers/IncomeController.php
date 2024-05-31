<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Services\BalanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Psy\debug;

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

//        $balance->incomes()->each(function ($income) {
//
//        });


        return view('balance.income', compact('balance'));
    }

    public function today(Balance $balance)
    {
        $incomes = $this->balanceService->todayIncomes($balance);
        return redirect()->back()->with('incomes', $incomes);
    }
}

