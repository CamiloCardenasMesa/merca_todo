<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductOrder;
use App\Services\WebcheckoutService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

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
            $productOrder = new ProductOrder();

            $productOrder->quantity = $cartItem->qty;
            $productOrder->order_id = $order->id;
            $productOrder->product_id = $cartItem->id;
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
            'returnUrl' => route('buyer.orders.show', $order->id),
        ]);

        $order->session_id = $response['requestId'];
        $order->process_url = $response['processUrl'];

        $order->save();

        Cart::destroy();

        return Redirect::to($order->process_url);
    }

    public function show(Order $order): View
    {
        if ($order->state === 'PENDING') {
            $webcheckoutService = new WebcheckoutService();

            $response = $webcheckoutService->getInformation($order->session_id);

            if ($response['status']['status'] !== 'PENDING') {
                $order->state = $response['status']['status'];

                $order->save();
            }
        }

        return view('buyer.orders.show', compact('order'));
    }

    public function retry(Order $order): RedirectResponse
    {
        /*  dd($order->productsOrder()); */
        $newOrder = new Order();

        $newOrder->reference = Str::uuid();
        $newOrder->currency = 'COP';
        $newOrder->state = 'PENDING';
        $newOrder->total = $order->total;
        $newOrder->user_id = Auth::user()->id;

        $newOrder->save();

        foreach ($order->productsOrder() as $productOrder) {
            $productNewOrder = new ProductOrder();

            $productNewOrder->quantity = $productOrder->qty;
            $productNewOrder->newOrder_id = $newOrder->id;
            $productNewOrder->product_id = $productOrder->product_id;
        }

        $webcheckoutService = new WebcheckoutService();

        $response = $webcheckoutService->createSession([
            'payment' => [
                'amount' => [
                    'currency' => $newOrder->currency,
                    'total' => $newOrder->total,
                ],
                'reference' => $newOrder->id,
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('buyer.orders.show', $newOrder->id),
        ]);

        $newOrder->session_id = $response['requestId'];
        $newOrder->process_url = $response['processUrl'];

        $newOrder->save();

        return Redirect::to($newOrder->process_url);
    }

    public function index(): View
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('buyer.orders.index', compact('orders'));
    }
}
