<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BuyerController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->query('query')) {
            $products = Product::where('name', 'like', '%'.$request->query('query').'%')
                ->orWhere('description', 'like', '%'.$request->query('query').'%')
                ->paginate(4);
        } else {
            $products = Product::paginate(8);
        }

        return view('dashboard', compact('products'));
    }

    public function show(Product $product): View|RedirectResponse
    {
        if ($product->enable) {
            return view('buyer.products.show', compact('product'));
        } else {
            return redirect()->route('dashboard');
        }
    }
}
