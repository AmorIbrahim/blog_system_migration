<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category_post')->insert([
            ['post_id' => 1, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['post_id' => 2, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
