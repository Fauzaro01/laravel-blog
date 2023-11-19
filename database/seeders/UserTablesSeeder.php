<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "id" => Str::random(13),
            "username" => "fauzaro01",
            "email" => "muhamadfauzan4750@gmail.com",
            "password" => Hash::make('admin1234'), 
            "role" => "admin",
        ]);
    }
}
