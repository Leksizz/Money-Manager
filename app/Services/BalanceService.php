<?php

namespace App\Services;

use App\DTO\Balance\FinanceDTO;
use App\Models\Balance;
use Illuminate\Support\Number;

class BalanceService
{
    public function amount(Balance $balance): string
    {
        return Number::currency($balance->amount, $this->currency($balance), 'f');
    }

    private function currency(Balance $balance): string
    {
        return $balance->currency->code;
    }

    public function addFinance(string $type, Balance $balance, FinanceDTO $DTO)
    {
        $balance->$type()->create([
            'amount' => $DTO->amount,
            'category_id' => $DTO->category_id,
            'balance_id' => $balance->id,
        ]);

        self::updateBalance($type, $balance, $DTO);
    }

    private static function updateBalance(string $type, Balance $balance, FinanceDTO $DTO)
    {
        match ($type) {
            'income' => $balance->increment('amount', $DTO->amount),
            'expense' => $balance->decrement('amount', $DTO->amount),
            default => throw new \InvalidArgumentException("Invalid type: $type"),
        };
    }
}
