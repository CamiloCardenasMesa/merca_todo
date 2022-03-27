<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(): RedirectResponse
    {
        $cart = Cart::content();
        $order = new Order();

        $order->reference = Str::uuid();
        $order->currency = 'COP';
        $order->state = 'PENDING';
        $order->total = Cart::pricetotal();

        $order->save();

        foreach ($cart as $cartItem) {
            $orderProduct = new OrderProduct();

            $orderProduct->quantity = $cartItem->qty;
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $cartItem->id;
        }
    }
}
