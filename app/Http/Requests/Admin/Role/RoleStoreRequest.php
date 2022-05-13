<?php

namespace App\Http\Requests\Admin\Role;

use App\Rules\RoleStoreRules;
use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return RoleStoreRules::toArray();
    }
}
