<?php

namespace Tests\Feature\Admin\products;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ShowProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanRenderShowProductsScreen(): void
    {
        //Arrange
        $UserPermission = Permission::create([
            'name' => Permissions::PRODUCT_LIST,
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($UserPermission);

        $admin = User::factory()
            ->create()
            ->assignRole($adminRole);

        $category = Category::factory()
            ->create();

        $productshow = Product::factory()
            ->for($category)
            ->create();

        //Act or Request
        $response = $this->actingAs($admin)
            ->get(route('admin.products.show', $productshow));

        //Assert
        $response->assertOk();
        $this->assertAuthenticated();
        $response->assertViewIs('admin.products.show');
        $this->assertCount(1, Product::all());
    }

    public function testNotAdminUserCantRenderShowProductsScreen(): void
    {
        $buyerRole = Role::create([
            'name' => Roles::BUYER,
        ]);

        $guest = User::factory()
            ->create()
            ->assignRole($buyerRole);

        $productshow = Product::factory()
            ->create();

        //Act or Request
        $response = $this->actingAs($guest)
            ->get(route('admin.products.show', $productshow));

        //Assert
        $response->assertForbidden();
        $this->assertDatabaseCount('products', 1);
        $this->assertAuthenticated();
    }

    public function testNotAdminUserCantRenderProductDisable(): void
    {
        $UserPermission = Permission::create([
            'name' => Permissions::USER_LIST,
        ]);

        $buyerRole = Role::create([
            'name' => Roles::GUEST,
        ])->givePermissionTo($UserPermission);

        $guest = User::factory()
            ->create()
            ->assignRole($buyerRole);

        $product = Product::factory()
            ->create();

        $response = $this->actingAs($guest)
            ->get(route('admin.products.show', !$product->enable));

        //Assert
        $response->assertForbidden();
        $this->assertAuthenticated();
    }
}
