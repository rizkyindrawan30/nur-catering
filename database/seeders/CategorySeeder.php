<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category' => "Nasi Kotak",
        ]);
        Category::create([
            'category' => "Nasi Bungkus",
        ]);
        Category::create([
            'category' => "Nasi Tumpeng",
        ]);
    }
}
