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
            ['name' => 'Sara Mohamed', 'phone' => '0100000003', 'email' => 'sara@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Omar Khaled', 'phone' => '0100000004', 'email' => 'omar@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Layla Samir', 'phone' => '0100000005', 'email' => 'layla@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Youssef Nabil', 'phone' => '0100000006', 'email' => 'youssef@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Fatma Adel', 'phone' => '0100000007', 'email' => 'fatma@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Khaled Tamer', 'phone' => '0100000008', 'email' => 'khaled@example.com', 'password' => Hash::make('123456')],
            ['name' => 'Nour Hany', 'phone' => '0100000009', 'email' => 'nour@example.com', 'password' => Hash::make('123456')],
        ]);
    }
}
