<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password',
            'roles' => 'required',
            'phone' => [
                Rule::unique('users', 'phone'),
            ],
            'birthday' => 'nullable|date_format:Y-m-d',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
        ];
    }
}
