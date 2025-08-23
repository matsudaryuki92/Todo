<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todos')->insert([[
            'contents' => '料理をする！',
            'completed' => false,
            'created_at' => now(),
        ],[
            'contents' => '勉強をする！',
            'completed' => false,
            'created_at' => now(),
        ],[
            'contents' => 'トイレットペーパーを買いに行く！',
            'completed' => false,
            'created_at' => now(),
        ],[
            'contents' => '洗濯をする！',
            'completed' => false,
            'created_at' => now(),
        ],[
            'contents' => '掃除をする！',
            'completed' => false,
            'created_at' => now(),
        ]
    ]);
    }
}
