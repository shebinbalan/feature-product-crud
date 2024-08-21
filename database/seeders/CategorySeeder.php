<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'description' => 'Devices, gadgets, and accessories'],
            ['name' => 'Books', 'description' => 'All kinds of books and literature'],
            ['name' => 'Fashion', 'description' => 'Apparel for men, women, and children'],
            ['name' => 'Home & Kitchen', 'description' => 'Household items, kitchenware, and furniture'],
            ['name' => 'Sports & Outdoors', 'description' => 'Equipment and apparel for outdoor activities and sports'],
        ]);
    }
}
