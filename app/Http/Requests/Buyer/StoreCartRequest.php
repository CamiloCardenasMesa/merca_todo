<?php

namespace App\Http\Requests\Buyer;

use App\Rules\StoreCartRules;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return StoreCartRules::toArray();
    }
}
