<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCartTest extends TestCase
{
    use RefreshDatabase;

    public function testCartItemCanIncreaseQuantity(): void
    {
        $product = Product::factory()->create();
        $cartItem = Cart::add($product, 1, ['image' => $product->image, 'description' => $product->description]);

        $response = $this->patch(route('buyer.cart.update', $cartItem->rowId), [
            'changeQuantity' => 'increase',
        ]);

        $response->assertRedirect();
        $this->assertEquals(2, $cartItem->qty);
        $this->assertGuest();
    }

    public function testCartItemCanDecreaseQuantity(): void
    {
        $product = Product::factory()->create();
        $cartItem = Cart::add($product, 2, ['image' => $product->image, 'description' => $product->description]);

        $response = $this->patch(route('buyer.cart.update', $cartItem->rowId), [
            'changeQuantity' => 'decrease',
        ]);

        $response->assertRedirect();
        $this->assertEquals(1, $cartItem->qty);
        $this->assertGuest();
    }
}
