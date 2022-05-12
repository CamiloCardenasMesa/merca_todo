<?php

namespace App\Imports;

use App\Models\Product;
use App\Rules\ProductsRules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row): ?Model
    {
        /*  dd($this->categories); */
        $product = new Product();
        $product->name = Arr::get($row, 'name');
        $product->image = Storage::disk('images')->put('product_images', new File('images/imagen_de_muestra3.jpg'));
        $product->description = Arr::get($row, 'description');
        $product->price = Arr::get($row, 'price');
        $product->stock = Arr::get($row, 'stock');
        $product->category_id = Arr::get($row, 'category_id');
        $product->enable = Arr::get($row, 'enable');

        return $product;
    }

    public function rules(): array
    {
        $rules = Arr::except(ProductsRules::toArray(), 'image');

        return $rules;
    }
}
