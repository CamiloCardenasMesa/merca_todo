<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buyer\StoreCartRequest;
use App\Http\Requests\Buyer\UpdateCartRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $shoppingCart = Cart::content();

        return view('buyer.cart.index', compact('shoppingCart'));
    }

    public function store(StoreCartRequest $request): RedirectResponse
    {
        $product = Product::findOrFail($request->input('product_id'));

        Cart::add($product, $request->input('product_amount'), ['image' => $product->image, 'description' => $product->getDescription()]);

        return redirect()->back()
            ->with('status', trans('products.add_product'));
    }

    public function update(UpdateCartRequest $request, string $rowId): RedirectResponse
    {
        $qty = Cart::get($rowId)->qty;

        if ($request->input('changeQuantity') === 'increase') {
            Cart::update($rowId, $qty + 1);
        } elseif ($request->input('changeQuantity') === 'decrease') {
            Cart::update($rowId, $qty - 1);
        }

        return redirect()->back()
            ->with('status', trans('products.update_product'));
    }

    public function destroy(string $rowId): RedirectResponse
    {
        Cart::remove($rowId);

        return redirect()->back()
            ->with('status', trans('products.delete_product'));
    }
}
