<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->has(Product::factory()->count(8))
        ->create([
            'name' => 'Instrumentos de cuerda',
        ]);

        Category::factory()->has(Product::factory()->count(8))
        ->create([
            'name' => 'Instrumentos de percusión',
        ]);
    }
}
