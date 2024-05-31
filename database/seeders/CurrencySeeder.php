<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            ['code' => 'USD', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'EUR', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'RUB', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'CNY', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['code' => 'GBP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
