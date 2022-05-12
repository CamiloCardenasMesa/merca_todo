<?php

namespace Tests\Feature\Admin\products;

use App\Constants\Permissions;
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
        $this->withoutExceptionHandling();
        //Arrange
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin_1']);
        $permissions = Permission::create([
            'name' => Permissions::PRODUCT_EDIT, ]);
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $category = Category::factory()->create();

        $productshow = Product::factory()->for($category)->create();

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.products.show', $productshow));

        //Assert
        $response->assertOk();
        $this->assertAuthenticated();
        $response->assertViewIs('admin.products.show');
        $this->assertCount(1, Product::all());
    }

    public function testNotAdminUserCantRenderShowProductsScreen(): void
    {
        $guestRole = Role::create(['name' => 'guest']);

        $guest = User::factory()->create()->assignRole($guestRole);

        $productshow = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($guest)->get(route('admin.products.show', $productshow));

        //Assert
        $response->assertForbidden();
        $this->assertDatabaseCount('products', 1);
        $this->assertAuthenticated();
    }
}
