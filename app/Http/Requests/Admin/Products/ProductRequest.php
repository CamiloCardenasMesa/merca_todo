<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:190|string',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1000',
            'description' => 'required|string',
            'price' => 'required|integer|min:1|max:100000000',
            'stock' => 'required|integer|max:10000',
            'category' => 'name|exists:categories,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'image' => 'imagen',
            'description' => 'descripción',
            'price' => 'precio',
            'category' => 'categoría',
        ];
    }
}
