<?php

namespace App\Imports;

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
        $product->image = Storage::disk('images')->put('product_images', new File('images/instruments/imagen_de_muestra3.jpg'));
        $product->description = Arr::get($row, 'description');
        $product->price = Arr::get($row, 'price');
        $product->stock = Arr::get($row, 'stock');
        $product->category_id = Arr::get($row, 'category_id');
        $product->enable = Arr::get($row, 'enable');

        return $product;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:190|string',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1000',
            'description' => 'required|string',
            'price' => 'required|integer|min:10000|max:10000000',
            'stock' => 'required|integer|min:1|max:100',
            'category_id' => 'required|integer|min:1|max:3',
            'enable' => 'boolean',
        ];
    }
}
