<?php

namespace App\Actions;

use App\Constants\States;
use App\Models\Order;
use App\Models\ProductOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateOrderAction
{
    public static function create(): Order
    {
        $cart = Cart::content();
        $order = new Order();

        $order->reference = Str::uuid();
        $order->currency = 'COP';
        $order->state = States::PENDING;
        $order->total = (int)Cart::priceTotalFloat();
        $order->user_id = Auth::user()->id;

        $order->save();

        foreach ($cart as $cartItem) {
            $productOrder = new ProductOrder();

            $productOrder->quantity = $cartItem->qty;
            $productOrder->order_id = $order->id;
            $productOrder->product_id = $cartItem->id;

            $productOrder->save();
        }

        return $order;
    }
}
