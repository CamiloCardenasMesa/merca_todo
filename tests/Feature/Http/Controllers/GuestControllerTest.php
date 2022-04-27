<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testWelcomeViewCanBeRendered(): void
    {
        $response = $this->get(route('welcome'));

        $response->assertOk();
        $response->assertViewHas('products');
        $response->assertViewIs('welcome');
        $this->assertGuest();
    }

    public function testGuestBuyerProductShowViewCanBeRendered(): void
    {
        $this->withoutExceptionHandling();

        $product = Product::factory()->create();

        //Act or Request
        $response = $this->get(route('guest.products.show', $product));

        //Assert
        $response->assertViewIs('guest.products.show');
        $response->assertViewHas('product');
        $this->assertDatabaseCount('products', 1);
        $this->assertGuest();
        $this->assertFalse(!$product->enable);
        $this->assertTrue($product->enable);
    }
}
