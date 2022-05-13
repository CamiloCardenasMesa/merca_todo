<?php

namespace App\Rules;

class UpdateCartRules implements Rules
{
    public static function toArray(): array
    {
        return [
            'changeQuantity' => ['required', 'string'],
        ];
    }
}
