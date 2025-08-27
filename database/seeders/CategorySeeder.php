<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
        [
            'title' => '仕事',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'title' => '勉強',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'title' => '家事',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'title' => '趣味',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'title' => 'その他',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
    }
}
