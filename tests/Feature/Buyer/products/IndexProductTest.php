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
        $response = $this->actingAs($buyer)->get(route('dashboard'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('dashboard');
        $response->assertViewHas('products');
        $this->assertAuthenticated();
    }
}
