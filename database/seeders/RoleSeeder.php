<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'user', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
