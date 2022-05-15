<?php

namespace App\Contracts;

use App\Models\Product;
use Illuminate\Http\Request;

interface StoreOrUpdateProductContract
{
    public static function execute(Request $request, ?Product $product = null): Product;
}
