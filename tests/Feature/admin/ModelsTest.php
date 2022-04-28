<?php

namespace Tests\Feature\admin;

use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelsTest extends TestCase
{
    use RefreshDatabase;

    public function testUserHasManyOrders(): void
    {
        $user = new User();
        $this->assertInstanceOf(Collection::class, $user->orders);
    }

    public function testProductHasManyProductOrder(): void
    {
        $product = new Product();
        $this->assertInstanceOf(Collection::class, $product->productOrder);
    }

    public function testProductOrderHasOneProduct(): void
    {
        $productOrder = new ProductOrder();
        $this->assertInstanceOf(ProductOrder::class, $productOrder);
    }
}
