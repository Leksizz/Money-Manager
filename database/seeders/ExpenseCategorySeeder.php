<?php

namespace Database\Seeders;

use App\Models\ExpenseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expense_categories')->insert([
            ['name' => 'Продукты', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Транспорт', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Здоровье', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Дом', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Учеба', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Бытовые товары', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
