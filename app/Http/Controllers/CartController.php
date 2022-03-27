<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buyer\AddProductToCartRequest;
use App\Http\Requests\Buyer\UpdateCartRequest;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function store(AddProductToCartRequest $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        /*  dd($product->getImage()); */

        Cart::add($product, $request->input('product_amount'), ['image' => $product->image, 'description' => $product->getDescription()]);

        return redirect()->back()->with('status', 'Producto agregado exitosamente');
    }

    public function index()
    {
        $shoppingCart = Cart::content();

        return view('buyer.cart.index', compact('shoppingCart'));
    }

    public function destroy(string $rowId)
    {
        Cart::remove($rowId);

        return redirect()->back()->with('status', 'El producto ha sido eliminado del carrito.');
    }

    public function update(UpdateCartRequest $request, string $rowId): RedirectResponse
    {
        /* dd($request->input('changeQuantity')); */
        $qty = Cart::get($rowId)->qty;

        if ($request->input('changeQuantity') == 'increase') {
            Cart::update($rowId, $qty + 1);
        } elseif ($request->input('changeQuantity') == 'decrease') {
            Cart::update($rowId, $qty - 1);
        }

        return redirect()->back()->with('status', 'El producto ha sido actualizado correctamente');
    }
}
