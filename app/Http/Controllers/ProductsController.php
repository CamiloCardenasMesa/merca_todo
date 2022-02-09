<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductsController extends Controller
{
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

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->hashName();
            $product->image = $file->storeAs('images', $fileName, 'public');
        }

        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $product = new Product();

        $product->image = $request->input('image');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        $file = $request->file('image');
        $fileName = $file->hashName();
        $product->image = $file->storeAs('images', $fileName, 'public');

        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        Storage::disk('public')->delete($product->image);

        return redirect()->route('admin.products.index');
    }

    public function toggle(Product $product): RedirectResponse
    {
        $product->enable = !$product->enable;

        $product->save();

        return redirect()->route('admin.products.index');
    }
}
