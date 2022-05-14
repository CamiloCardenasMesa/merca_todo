<?php

namespace Tests\Unit;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ProductsOrderHasOneProductTest extends TestCase
{
    public function testProductOrderHasOneProduct(): void
    {
        $productOrder = new ProductOrder();
        $this->assertInstanceOf(Collection::class, $productOrder->product);
    }
}
