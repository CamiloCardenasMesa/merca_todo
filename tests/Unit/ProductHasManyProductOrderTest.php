<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ProductHasManyProductOrderTest extends TestCase
{
    public function testProductOrderHasOneProduct(): void
    {
        $product = new Product();
        $this->assertInstanceOf(Collection::class, $product->productOrder);
    }
}
