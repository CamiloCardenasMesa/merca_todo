<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCartTest extends TestCase
{
    use RefreshDatabase;

    public function testCartItemCanIncreaseQuantity(): void
    {
        $this->markTestSkipped();

        $user = User::factory()->create();
        $product = Product::factory()->create();
        $cartItem = Cart::add($product, 1, ['image' => $product->image, 'description' => $product->description]);

        $response = $this->actingAs($user)->patch(route('buyer.cart.update', $cartItem->rowId), [
            'changeQuantity' => 'increase',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect();
        $this->assertEquals(2, $cartItem->qty);
    }

    public function testCartItemCanDecreaseQuantity(): void
    {
        $this->markTestSkipped();

        $user = User::factory()->create();
        $product = Product::factory()->create();
        $cartItem = Cart::add($product, 2, ['image' => $product->image, 'description' => $product->description]);

        $response = $this->actingAs($user)->patch(route('buyer.cart.update', $cartItem->rowId), [
            'changeQuantity' => 'decrease',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect();
        $this->assertEquals(1, $cartItem->qty);
    }
}
