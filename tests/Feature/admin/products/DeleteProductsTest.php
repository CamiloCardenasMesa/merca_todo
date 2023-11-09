<?php

namespace Tests\Feature\Admin\products;

use App\Constants\Permissions;
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
        $this->markTestSkipped();

        //Arrange
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin_1']);
        $permissions = Permission::create([
            'name' => Permissions::PRODUCT_DELETE, ]);
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $productDeleted = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->delete(route('admin.products.destroy', $productDeleted));

        //Assert
        $response->assertRedirect('admin/products');
        $this->assertAuthenticated();
        $this->assertFalse(Storage::disk('public')->exists($productDeleted->product_image));
        $this->assertCount(0, Product::all());
    }
}
