<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            ['category_name' => "Happy"],
            ['category_name' => "Sedih"],
            ['category_name' => "CandaTawa"],
            ['category_name' => "Study"],
            ['category_name' => "Memories"]
        ]);
        
    }
}
