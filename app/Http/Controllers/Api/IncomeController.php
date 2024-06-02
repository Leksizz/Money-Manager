<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\IncomeResource;
use App\Models\Balance;
use App\Models\Income;
use App\Services\Api\BalanceService;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function period(): AnonymousResourceCollection
    {
        dd(13);
    }
}
