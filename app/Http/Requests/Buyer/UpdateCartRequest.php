<?php

namespace App\Http\Requests\Buyer;

use App\Rules\UpdateCartRules;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return UpdateCartRules::toArray();
    }
}
