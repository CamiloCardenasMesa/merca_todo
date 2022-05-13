<?php

namespace App\Actions;

use App\Contracts\StoreOrUpdateProductContract;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductUpdateOrStoreAction implements StoreOrUpdateProductContract
{
    public static function execute(Request $request, ?Model $model = null): Model
    {
        $product = $model ?? new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $product->image = $request->file('image')
                ->storeAs('product_images', $fileName, 'public');
        }

        $product->save();

        return $product;
    }
}
