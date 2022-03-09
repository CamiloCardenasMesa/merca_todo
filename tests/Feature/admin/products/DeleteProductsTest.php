<?php

namespace Tests\Feature\admin;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DeleteProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanDeleteProducts(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $permissionToDeleteProducts = Permission::create(['name' => Permissions::DELETE_PRODUCTS]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
        ->givePermissionTo($permissionToDeleteProducts);

        $admin = User::factory()->create()->assignRole($adminRole);

        $productDeleted = Product::factory()->create();

        //Act or Request
        /* dd(route('admin.products.destroy', $productDeleted)); */
        $response = $this->actingAs($admin)->delete(route('admin.products.destroy', $productDeleted));

        $this->assertCount(0, Product::all());

        //Assert
        $response->assertRedirect('/products'); //no sé por qué no se redirecciona
        $this->assertAuthenticated();
        $this->assertFalse(Storage::disk('public')->exists($productDeleted->product_image));
    }
}
