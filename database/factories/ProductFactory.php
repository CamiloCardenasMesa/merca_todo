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
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->randomNumber(6),
            'stock' => $this->faker->numberBetween(2, 10),
            'enable' => true,
            'image' => Storage::disk('images')->put('product_images', new File('public/images/imagen_de_muestra2.jpg')),
        ];
    }
}
