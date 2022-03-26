<?php

namespace Tests\Feature\Buyer\Cart;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Tests\TestCase;

class IndexCartTest extends TestCase
{
    public function testIndexCartViewCanBeRendered(): void
    {
        /* $this->withoutExceptionHandling(); */

        $products = Product::factory()->count(5)->create();

        foreach ($products as $product) {
            Cart::add($product, 3);
        }
        $shoppingCart = Cart::content();

        $response = $this->get(route('buyer.cart.index'));

        $this->assertGuest();
        $response->assertOk();
        $response->assertViewIs('buyer.cart.index');
        $response->assertViewHas('shoppingCart', $shoppingCart);
    }
}
