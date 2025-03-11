<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Programmation', 'description' => 'Cours de programmation']);
        Category::create(['name' => 'Design', 'description' => 'Cours de design']);
        Category::create(['name' => 'Marketing', 'description' => 'Cours de marketing']);
    }
}
