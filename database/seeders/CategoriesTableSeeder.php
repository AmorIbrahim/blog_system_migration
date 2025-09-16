<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['Name' => 'Technology', 'Description' => 'All about tech', 'created_at' => now(), 'updated_at' => now()],
            ['Name' => 'Lifestyle', 'Description' => 'Daily life and hobbies', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
