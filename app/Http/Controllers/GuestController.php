<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuestController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->query('query')) {
            $products = Product::where('name', 'like', '%'.$request->query('query').'%')
                ->orWhere('description', 'like', '%'.$request->query('query').'%')
                ->where('enable', true)
                ->paginate(8);
        } else {
            $products = Product::where('enable', true)->orderBy('id', 'desc')->paginate(8);
        }

        return view('welcome', compact('products'));
    }

    public function show(Product $product): View
    {
        if (!$product->enable) {
            return back();
        }

        return view('guest.products.show', compact('product'));
    }
}
