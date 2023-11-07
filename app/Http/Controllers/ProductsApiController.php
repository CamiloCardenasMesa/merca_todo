<?php

namespace App\Http\Controllers;

use App\Actions\ProductUpdateOrStoreAction;
use App\Http\Requests\Admin\Products\ProductRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductsApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $products = Product::paginate(4);

        return ProductsResource::collection($products);
    }

    public function store(ProductRequest $request): ProductsResource
    {
        $product = ProductUpdateOrStoreAction::execute($request);

        return new ProductsResource($product);
    }

    public function show(Product $product): ProductsResource
    {
        $productShow = $product;

        return new ProductsResource($productShow);
    }

    public function update(ProductRequest $request, Product $productUpdated): ProductsResource
    {
        $product = ProductUpdateOrStoreAction::execute($request, $productUpdated);

        return new ProductsResource($product);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([
            'message' => 'Product deleted',
        ]);
    }
}
