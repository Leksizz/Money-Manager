<?php

namespace App\DTO\Balance;

use Spatie\LaravelData\Data;

class FinanceDTO extends Data
{
    public float $amount;

    public int $category_id;
}
