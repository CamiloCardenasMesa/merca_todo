<?php

namespace App\Imports;

use App\Http\Validation\ProductValidationRules;
use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row): ?Product
    {
        $product = new Product();
        $product->name = Arr::get($row, 'name');
        $product->image = Storage::disk('images')->put('product_images', new File('images/product_image.png'));
        $product->description = Arr::get($row, 'description');
        $product->price = Arr::get($row, 'price');
        $product->stock = Arr::get($row, 'stock');
        $product->category_id = Arr::get($row, 'category_id');
        $product->enable = Arr::get($row, 'enable');

        return $product;
    }

    public function rules(): array
    {
        return ProductValidationRules::rules();
    }
}
