<?php

namespace App\Http\Controllers\Api;

use App\DTO\Date\DateDTO;
use App\Http\Requests\Date\DateRequest;
use App\Http\Resources\BalanceResource;
use App\Http\Resources\ExpenseResource;
use App\Http\Resources\IncomeResource;
use App\Models\Balance;
use App\Services\Api\BalanceService;
use http\Env\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FinanceController
{

    private BalanceService $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function today(string $type, Balance $balance): AnonymousResourceCollection
    {
        $finance = $this->balanceService->today($balance->$type());

        return $this->collection($type, $finance);
    }


    public function week(string $type, Balance $balance): AnonymousResourceCollection
    {
        $finance = $this->balanceService->week($balance->$type());

        return $this->collection($type, $finance);
    }

    public function month(string $type, Balance $balance): AnonymousResourceCollection
    {
        $finance = $this->balanceService->month($balance->$type());

        return $this->collection($type, $finance);
    }

    public function year(string $type, Balance $balance): AnonymousResourceCollection
    {
        $finance = $this->balanceService->year($balance->$type());

        return $this->collection($type, $finance);
    }

    public function all(string $type, Balance $balance): AnonymousResourceCollection
    {
        $finance = $this->balanceService->all($balance->$type());

        return $this->collection($type, $finance);
    }

    public function period(string $type, Balance $balance, DateRequest $request): AnonymousResourceCollection
    {
        $validatedData = $request->validated();
        $DTO = DateDTO::from($validatedData);

        $finance = $this->balanceService->period($balance->$type(), $DTO);

        return $this->collection($type, $finance);
    }

    public function statistic(Balance $balance): BalanceResource
    {
        return new BalanceResource($balance);
    }

    private function collection(string $type, Collection $finance): AnonymousResourceCollection
    {
        return match ($type) {
            'income' => IncomeResource::collection($finance),
            'expense' => ExpenseResource::collection($finance),
            default => throw new \InvalidArgumentException("Invalid type: $type"),
        };
    }
}
