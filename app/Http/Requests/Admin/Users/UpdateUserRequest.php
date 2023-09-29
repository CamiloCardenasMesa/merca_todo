<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'phone' => 'nullable|string', 
            'birthday' => 'nullable|date_format:Y-m-d', 
            'address' => 'nullable|string', 
            'city' => 'nullable|string',   
            'country' => 'nullable|string',
        ];
    }
}
