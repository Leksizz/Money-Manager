<?php

namespace App\Services;

use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
}
