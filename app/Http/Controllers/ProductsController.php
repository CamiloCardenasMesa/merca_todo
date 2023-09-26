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
    protected $productAction;

    public function __construct(ProductUpdateOrStoreAction $productAction)
    {
        $this->authorizeResource(Product::class, 'product');
        $this->productAction = $productAction;
    }

    public function index(Request $request): View
    {
        $query = $request->query('query');

        $products = Product::searchByNameOrDescription($query)
            ->orderBy('id', 'desc')
            ->paginate(25);

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
        $this->productAction->execute($request, $product);

        return redirect()->route('admin.products.index')
            ->with('status', trans('products.updated'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productAction->execute($request);

        return redirect()->route('admin.products.index')
            ->with('status', trans('products.created'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        Storage::disk('images')->delete($product->image);

        return redirect()->route('admin.products.index')
            ->with('status', trans('products.deleted'));
    }

    public function toggle(Product $product): RedirectResponse
    {
        $product->enable = !$product->enable;

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('status', trans('products.updated'));
    }
}
