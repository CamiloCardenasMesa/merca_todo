<?php

namespace App\Http\Requests\Admin\Products;

use App\Http\Validation\ProductValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return ProductValidationRules::rules();
    }
}
