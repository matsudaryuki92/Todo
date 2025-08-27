<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todos')->insert([[
            'category_id' => 1,
            'contents' => '年末調整をする！',
            'completed' => false,
            'deadline' => now()->tomorrow(),
            'created_at' => now(),
        ],
        [
            'category_id' => 2,
            'contents' => 'システム設計をする！',
            'completed' => false,
            'deadline' => now()->tomorrow(),
            'created_at' => now(),
        ]]);
    }
}
