<?php

namespace App\Http\Controllers;

use App\Actions\ProductUpdateOrStoreActionContract;
use App\Http\Requests\Admin\Products\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update', 'toggle']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {
        if ($request->query('query')) {
            $products = Product::where('name', 'like', '%'.$request->query('query').'%')
            ->orwhere('description', 'like', '%'.$request->query('query').'%')
            ->paginate(8);
        } else {
            $products = Product::paginate(8);
        }

        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        ProductUpdateOrStoreActionContract::execute($request, $product);

        return redirect()->route('admin.products.index')
                         ->with('status', 'Product updated successfully.');
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        ProductUpdateOrStoreActionContract::execute($request);

        return redirect()->route('admin.products.index')
                         ->with('status', 'Product created successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        Storage::disk('public')->delete($product->image);

        return redirect()->route('admin.products.index')
                         ->with('status', 'Product deleted successfully.');
    }

    public function toggle(Product $product): RedirectResponse
    {
        $product->enable = !$product->enable;

        $product->save();

        return redirect()->route('admin.products.index');
    }
}
