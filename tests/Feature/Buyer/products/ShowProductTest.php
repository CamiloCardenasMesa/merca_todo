<?php

namespace Tests\Feature\Buyer\products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ShowProductTest extends TestCase
{
    use RefreshDatabase;

    public function testShowProductsScreenCanBeRendered(): void
    {
        $this->withoutExceptionHandling();

        //Arrange
        $buyer = User::factory()->create();
        $role = Role::create(['name' => 'buyer']);
        $buyer->assignrole($role);

        $product = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($buyer)->get(route('buyer.products.show', $product));

        //Assert

        $response->assertViewIs('buyer.products.show');
        $response->assertViewHas('product');
        $this->assertDatabaseCount('products', 1);
        $this->assertAuthenticated();
        $response->assertOk();
    }

}
