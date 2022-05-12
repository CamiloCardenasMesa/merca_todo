<?php

namespace App\Http\Requests\Admin\Products;

use App\Rules\ProductsRules;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return ProductsRules::toArray();
    }
}
