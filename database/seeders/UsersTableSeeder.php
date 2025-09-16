<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Ahmed Ali', 'phone' => '0100000001', 'email' => 'ahmed@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Mona Hassan', 'phone' => '0100000002', 'email' => 'mona@example.com', 'password' => Hash::make('123456')],
        ]);
    }
}
