<?php

namespace Database\Factories;

use App\Models\Balance;
use App\Models\IncomeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */

    public function definition(): array
    {
        return [
            'amount' => random_int(0, 9999999),
            'category_id' => IncomeCategory::get()->random()->id,
            'balance_id' => Balance::get()->random()->id,
        ];
    }
}
