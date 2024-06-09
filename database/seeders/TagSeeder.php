<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'Криптовалюта', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Инвестиции', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Финансы', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Рост', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Биржа', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Анализ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
