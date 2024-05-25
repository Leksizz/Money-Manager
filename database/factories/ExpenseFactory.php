<?php

namespace Database\Factories;

use App\Models\Balance;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends Factory<Expense>
 */
class ExpenseFactory extends Factory
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
            'category_id' => ExpenseCategory::get()->random()->id,
            'balance_id' => Balance::get()->random()->id,
        ];
    }
}
