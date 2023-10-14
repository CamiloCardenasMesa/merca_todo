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
        $query = $request->query('query');

        $products = Product::searchByNameOrDescription($query)
            ->where('enable', true)
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('welcome', compact('products'));
    }

    public function show(Product $product): View|RedirectResponse
    {
        if (!$product->enable) {
            return redirect()->route('welcome')
                ->with('status', trans('products.not_available'));
        }

        return view('buyer.products.show', compact('product'));
    }
}
