<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreCartTest extends TestCase
{
    use RefreshDatabase;
    
    public function testAddProductToCart(): void
    {
        $product = Product::factory()->create();
        $product_id = $product->id;
        $product_amount = 10;

        $response = $this->from(route('buyer.products.show', $product))
            ->post(route('buyer.cart.store'), compact('product_id', 'product_amount'));

        $this->assertGuest();
        $response->assertRedirect(route('buyer.products.show', $product));
    }
}
