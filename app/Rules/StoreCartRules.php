<?php

namespace App\Rules;

class StoreCartRules implements Rules
{
    public static function toArray(): array
    {
        return [
            'product_id' => ['required', 'integer'],
            'product_amount' => ['required', 'integer'],
        ];
    }
}
