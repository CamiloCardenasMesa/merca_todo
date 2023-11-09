<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexCartTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexCartViewCanBeRendered(): void
    {
        $this->markTestSkipped();

        $user = User::factory()->create();

        $products = Product::factory()->count(5)->create();

        foreach ($products as $product) {
            Cart::add($product, 5);
        }
        $shoppingCart = Cart::content();

        $response = $this->actingAs($user)->get(route('buyer.cart.index'));

        $this->assertAuthenticated();
        $response->assertOk();
        $response->assertViewIs('buyer.cart.index');
        $response->assertViewHas('shoppingCart', $shoppingCart);
    }
}
