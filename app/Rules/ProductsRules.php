<?php

namespace App\Rules;

class ProductsRules implements Rules
{
    public static function toArray(): array
    {
        return [
            'name' => 'required|max:190|string',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1000',
            'description' => 'required|string',
            'price' => 'required|integer|min:10000|max:10000000',
            'stock' => 'required|integer|max:10000',
            'category' => 'name|exists:categories,id',
        ];
    }
}