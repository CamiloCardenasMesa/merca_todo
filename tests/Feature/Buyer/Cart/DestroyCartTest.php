<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyCartTest extends TestCase
{
    use RefreshDatabase;

    public function testProductCanBeDeleted(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $cartItem = Cart::add($product, 1, ['image' => $product->image, 'description' => $product->description]);
        $response = $this->actingAs($user)->delete(route('buyer.cart.destroy', $cartItem->rowId));

        $this->assertAuthenticated();
        $response->assertRedirect();
        $this->assertEquals(0, Cart::count());
    }
}
