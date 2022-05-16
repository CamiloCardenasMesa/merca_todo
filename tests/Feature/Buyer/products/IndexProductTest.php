<?php

namespace Tests\Feature\Buyer;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class IndexProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProductsListCanBeRendered(): void
    {
        //Arrange
        $buyer = User::factory()->create();
        $role = Role::create(['name' => 'buyer']);
        $buyer->assignrole($role);

        //Act or Request
        $response = $this->actingAs($buyer)->get(route('welcome'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('welcome');
        $response->assertViewHas('products');
        $this->assertAuthenticated();
    }
}
