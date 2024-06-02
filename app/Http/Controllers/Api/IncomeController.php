<?php

namespace App\Http\Controllers\Api;

use App\DTO\Date\DateDTO;
use App\Http\Requests\Date\DateRequest;
use App\Http\Resources\IncomeResource;
use App\Models\Balance;
use App\Services\Api\BalanceService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IncomeController
{

    private BalanceService $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function today(Balance $balance): AnonymousResourceCollection
    {
        $incomes = $this->balanceService->today($balance->incomes());

        return IncomeResource::collection($incomes);
    }


    public function week(Balance $balance): AnonymousResourceCollection
    {
        $incomes = $this->balanceService->week($balance->incomes());

        return IncomeResource::collection($incomes);
    }

    public function month(Balance $balance): AnonymousResourceCollection
    {
        $incomes = $this->balanceService->month($balance->incomes());

        return IncomeResource::collection($incomes);
    }

    public function year(Balance $balance): AnonymousResourceCollection
    {
        $incomes = $this->balanceService->year($balance->incomes());

        return IncomeResource::collection($incomes);
    }

    public function all(Balance $balance): AnonymousResourceCollection
    {
        $incomes = $this->balanceService->all($balance->incomes());

        return IncomeResource::collection($incomes);
    }

    public function period(Balance $balance, DateRequest $request): AnonymousResourceCollection
    {
        $validatedData = $request->validated();
        $DTO = DateDTO::from($validatedData);

        $incomes = $this->balanceService->period($balance->incomes(), $DTO);

        return IncomeResource::collection($incomes);
    }
}
