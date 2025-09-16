<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            ['Title' => 'First Post', 'Content' => 'This is the first post content.', 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['Title' => 'Second Post', 'Content' => 'This is the second post content.', 'user_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
