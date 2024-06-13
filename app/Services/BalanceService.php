<?php

namespace App\Services;

use App\DTO\Balance\FinanceDTO;
use App\Models\Balance;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    /**
     * @throws Exception
     */
    public function addFinance(string $type, Balance $balance, FinanceDTO $DTO): void
    {
        try {
            DB::transaction(function () use ($type, $balance, $DTO) {
                $balance->$type()->create([
                    'amount' => $DTO->amount,
                    'category_id' => $DTO->category_id,
                    'balance_id' => $balance->id,
                ]);

                self::updateBalance($type, $balance, $DTO);
            });
        } catch (Exception $e) {
            Log::error('Error add finance: ', ['exception' => $e]);
            throw $e;
        }
    }

    private static function updateBalance(string $type, Balance $balance, FinanceDTO $DTO): void
    {
        match ($type) {
            'income' => $balance->increment('amount', $DTO->amount),
            'expense' => $balance->decrement('amount', $DTO->amount),
            default => throw new \InvalidArgumentException("Invalid type: $type"),
        };
    }
}
