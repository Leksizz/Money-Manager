<?php

namespace App\Http\Controllers;

use App\DTO\Balance\FinanceDTO;
use App\Http\Requests\Balance\FinanceRequest;
use App\Models\Balance;
use App\Services\BalanceService;
use Illuminate\View\View;

class FinanceController extends Controller
{
    private BalanceService $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function show(string $type, Balance $balance): View
    {
        $balance = $this->balanceService->amount($balance);

        return view("balance.$type", compact('type', 'balance'));
    }

    public function store(string $type, Balance $balance, FinanceRequest $request)
    {
        $validatedData = $request->validated();
        $DTO = FinanceDTO::from($validatedData);

        $this->balanceService->addFinance($type, $balance, $DTO);
        return back()->with(['status' => 'Данные успешно добавлены']);
    }

}

