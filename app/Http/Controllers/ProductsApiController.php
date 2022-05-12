<?php

namespace App\Http\Controllers;

use App\Actions\ProductUpdateOrStoreActionContract;
use App\Http\Requests\Admin\Products\ProductRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return ProductsResource::collection($products);
    }

    public function store(ProductRequest $request)
    {
        $product = ProductUpdateOrStoreActionContract::execute($request);

        return new ProductsResource($product);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return new ProductsResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product = ProductUpdateOrStoreActionContract::execute($request, $product);

        return new ProductsResource($product);
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
