<?php

namespace App\Http\Requests\Admin\Role;

use App\Rules\RoleUpdateRules;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return RoleUpdateRules::toArray();
    }
}