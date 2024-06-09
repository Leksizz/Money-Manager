<?php

namespace Database\Factories;

use App\Models\Balance;
use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balance>
 */
class BalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */


    public function definition(): array
    {
        foreach (User::all() as $index => $user) {
            $seed =
                [
                    'amount' => random_int(0, 9999999),
                    'user_id' => $index,
                ];
        }
        return $seed;
    }
}
