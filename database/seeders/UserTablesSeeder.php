<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "user_id" => "6541d894312d7",
            "username" => "fauzaro01",
            "email" => "muhamadfauzan4750@gmail.com",
            "password" => Hash::make('fauzan475'), 
            "role" => "admin",
            'isAllowed' => True
        ]);
    }
}
