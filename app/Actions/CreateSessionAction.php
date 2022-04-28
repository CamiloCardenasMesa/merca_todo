<?php

namespace App\Actions;

use App\Models\Order;
use App\Services\WebcheckoutService;

class CreateSessionAction
{
    public static function execute(WebcheckoutService $webcheckoutService, Order $order): array
    {
        return $webcheckoutService->createSession([
            'payment' => [
                'amount' => [
                    'currency' => $order->currency,
                    'total' => $order->total,
                ],
                'reference' => str_pad($order->id, 6, '0', STR_PAD_LEFT),
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('buyer.orders.show', $order->id),
        ]);
    }
}
