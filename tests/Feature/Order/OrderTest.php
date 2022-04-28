<?php

namespace Tests\Feature\order;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testAnAdminAnOrderCanBeRendered(): void
    {
        $role = Role::create(['name' => 'admin']);
        $admin = User::factory()->create()->assignRole($role);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('buyer.orders.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('buyer.orders.index');
        $response->assertViewHas('orders');
        $this->assertAuthenticated();
    }
}
