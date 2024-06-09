<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all(); // Получаем всех пользователей

        foreach ($users as $index => $user) {
            DB::table('balances')->insert([
                'amount' => rand(100, 5000),
                'user_id' => $index + 1,
            ]);
        }
    }
}
