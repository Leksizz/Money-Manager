<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('income_categories')->insert([
            ['name' => 'Зарплата', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Инвестиции', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Лотерея', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Подработка', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Подарок', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Продажа', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
