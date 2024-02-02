<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Development'],
            ['name' => 'Business'],
            ['name' => 'Finance & Accounting'],
            ['name' => 'IT & Software'],
            ['name' => 'Office Productivity'],
            ['name' => 'Personal Development'],
            ['name' => 'Design'],
            ['name' => 'Marketing'],
            ['name' => 'Lifestyle'],
            ['name' => 'Photography & Video'],
            ['name' => 'Health & Fitness'],
            ['name' => 'Teaching & Academics']
        ];

        DB::table('categories')->insert($categories);
    }
}
