<?php

namespace Tests\Feature\admin\products;

use App\Constants\Permissions;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ToggleProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanEnableProducts(): void
    {
        //Arrange
        $showUserPermission = Permission::create([
            'name' => Permissions::PRODUCT_EDIT,
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($showUserPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->put(route('admin.products.toggle', $product));

        $response->assertRedirect('/products');
        $this->assertAuthenticated();
        $this->assertFalse(!$product->enable);
        $this->assertTrue($product->enable);
    }
}
