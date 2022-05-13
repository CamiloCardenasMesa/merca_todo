<?php

namespace App\Rules;

class RoleStoreRules implements Rules
{
    public static function toArray(): array
    {
        return [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ];
    }
}
