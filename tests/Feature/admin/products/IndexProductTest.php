<?php

namespace Tests\Feature\admin\products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class IndexProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testProductsListCanBeRendered(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin_1']);
        $permissions = Permission::create([
            'name' => 'product-list', ]);
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $product = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.products.index', $product));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.products.index');
        $response->assertViewHas('products');
        $this->assertAuthenticated();
    }
}
