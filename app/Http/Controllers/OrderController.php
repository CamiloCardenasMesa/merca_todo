<?php

namespace App\Http\Controllers;

use App\Actions\CreateOrderAction;
use App\Actions\CreateSessionAction;
use App\Constants\States;
use App\Models\Order;
use App\Services\WebcheckoutService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('buyer.orders.index', compact('orders'));
    }

    public function show(Order $order, WebcheckoutService $webcheckoutService): View
    {
        if ($order->state === States::PENDING || $order->state === States::REJECTED) {
            $response = $webcheckoutService->getInformation($order->session_id);

            if ($response['status']['status'] !== States::PENDING) {
                $order->state = $response['status']['status'];
                $order->save();
            }
        }

        return view('buyer.orders.show', compact('order'));
    }

    public function store(
        WebcheckoutService $webcheckoutService,
        CreateSessionAction $createSessionAction
    ): RedirectResponse {
        $order = CreateOrderAction::create();

        $response = $createSessionAction::execute($webcheckoutService, $order);

        $order->session_id = $response['requestId'];
        $order->process_url = $response['processUrl'];

        $order->save();

        Cart::destroy();

        return Redirect::to($order->process_url);
    }

    public function retry(
        Order $order,
        WebcheckoutService $webcheckoutService,
        CreateSessionAction $createSessionAction
    ): RedirectResponse {
        $order->load('productsOrder');

        $response = $createSessionAction::execute($webcheckoutService, $order);

        $order->session_id = $response['requestId'];
        $order->process_url = $response['processUrl'];

        $order->save();

        return Redirect::to($order->process_url);
    }
}
