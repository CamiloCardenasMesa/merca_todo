<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyCartTest extends TestCase
{
    use RefreshDatabase;

    public function testProductCanBeDeleted(): void
    {
        $product = Product::factory()->create();
        $cartItem = Cart::add($product, 1, ['image' => $product->image, 'description' => $product->description]);
        
        $response = $this->delete(route('buyer.cart.destroy', $cartItem->rowId));

        $response->assertRedirect();
        $this->assertEquals(0, Cart::count());
        $this->assertGuest();
    }
}
