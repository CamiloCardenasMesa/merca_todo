<?php

namespace Tests\Feature;

use App\Constants\Permissions;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class EditProductTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanEditProducts(): void
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

        $product = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->put(route('admin.products.update', $product), [
            'name' => 'Test name',
            'image' => UploadedFile::fake()->image('products.jpg'),
            'description' => 'Test description',
            'price' => 10000,
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        $this->assertCount(1, Product::all());

        $product = $product->fresh();

        //Assert
        $response->assertRedirect('admin/products');
        $this->assertAuthenticated();
        $this->assertEquals('Test name', $product->name);
        $this->assertEquals('Test description', $product->description);
        $this->assertEquals(10000, $product->price);
        $this->assertEquals(10, $product->stock);
        $this->assertEquals($category->id, $product->category->id);
    }

    public function testAdminUserCanRenderedEditProductsView()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::create([
            'name' => Permissions::PRODUCT_EDIT, ]);
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $product = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.products.edit', $product));

        //Assert
        $response->assertOk();
        $this->assertAuthenticated();
        $response->assertViewIs('admin.products.edit');
    }
}
