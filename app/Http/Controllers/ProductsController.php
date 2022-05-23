<?php

namespace App\Http\Controllers;

use App\Actions\ProductUpdateOrStoreAction;
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
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Request $request): View
    {
        if ($request->query('query')) {
            $products = Product::where('name', 'like', '%'.$request->query('query').'%')
                ->orWhere('description', 'like', '%'.$request->query('query').'%')
                ->where('enable', true)
                ->paginate(8);
        } else {
            $products = Product::orderBy('id', 'desc')
                ->paginate(8);
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
        ProductUpdateOrStoreAction::execute($request, $product);

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
        ProductUpdateOrStoreAction::execute($request);

        return redirect()->route('admin.products.index')
                         ->with('status', 'Product created successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        Storage::disk('images')->delete($product->image);

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
