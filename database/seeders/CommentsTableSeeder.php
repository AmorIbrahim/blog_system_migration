<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comments')->insert([
            ['Content' => 'Nice post!', 'post_id' => 1, 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['Content' => 'Thanks for sharing!', 'post_id' => 2, 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
