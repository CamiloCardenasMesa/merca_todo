<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $instrumentsPath = public_path('images/instruments');

        $imageFiles = glob($instrumentsPath . '/*.{jpg,png,gif}', GLOB_BRACE);
        
        $randomImage = !empty($imageFiles) ? $imageFiles[array_rand($imageFiles)] : null;
        
        return [
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->paragraph(10, 10),
            'price' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(2, 10),
            'enable' => true,
            'image' => $randomImage ? Storage::disk('images')->putFile('product_images', new File($randomImage)) : null,
        ];
        
    }
}
