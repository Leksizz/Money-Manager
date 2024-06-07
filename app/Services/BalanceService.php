<?php

namespace App\Services;

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

    public function addFinance()
    {

    }

    private function updateBalance()
    {

    }
}
