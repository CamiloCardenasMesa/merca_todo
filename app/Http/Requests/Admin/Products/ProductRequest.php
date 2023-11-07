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
            'price' => 'required|integer|min:10000|max:10000000',
            'stock' => 'required|integer|min:1|max:100',
            'category_id' => 'required|integer|min:1|max:3',
            'enable' => 'boolean',
        ];
    }
}
