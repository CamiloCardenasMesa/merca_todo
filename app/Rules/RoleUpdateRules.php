<?php

namespace App\Rules;

class RoleUpdateRules implements Rules
{
    public static function toArray(): array
    {
        return [
            'name' => 'required',
            'permission' => 'required',
        ];
    }
}
