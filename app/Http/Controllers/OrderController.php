<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\WebcheckoutService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $order->total = (int) Cart::priceTotalFloat();
        $order->user_id = Auth::user()->id;

        $order->save();

        foreach ($cart as $cartItem) {
            $orderProduct = new OrderProduct();

            $orderProduct->quantity = $cartItem->qty;
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $cartItem->id;
        }

        $webcheckoutService = new WebcheckoutService();

        $response = $webcheckoutService->createSession([
            'payment' => [
                'amount' => [
                    'currency' => $order->currency,
                    'total' => $order->total,
                ],
                'reference' => $order->id,
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('dashboard'), //ruta api para actualizar orden + referencia
        ]);
        /* dd($response); */
        $order->session_id = $response['requestId'];
        $order->process_url = $response['processUrl'];

        $order->save();

        return Redirect::to($order->process_url);
    }
}
