<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['Name' => 'Laravel', 'created_at' => now(), 'updated_at' => now()],
            ['Name' => 'PHP', 'created_at' => now(), 'updated_at' => now()],
            ['Name' => 'WebDev', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
