<?php

namespace Tests\Unit;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ProductsOrderTest extends TestCase
{
    public function testOrderHasManyProductsOrders(): void
    {
        $order = new Order();
        $this->assertInstanceOf(Collection::class, $order->productsOrder);
    }
}
