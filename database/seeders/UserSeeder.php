<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(['name' => 'Tarek Zeguendri', 'email' => 'tarek@gmail.com', 'password' => Hash::make('Admin'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Rayane Bergoug', 'email' => 'rayane@gmail.com', 'password' => Hash::make('Admin'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Mouad', 'email' => 'mouad@gmail.com', 'password' => Hash::make('password'), 'role_id' => 1]);
    }
}