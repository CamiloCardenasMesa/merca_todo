<?php

namespace Tests\Feature;

use App\Constants\Permissions;
use App\Constants\Roles;
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
        $editProductsPermission = Permission::create([
            'name' => Permissions::UPDATE_PRODUCTS,
        ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
        ->givePermissionTo($editProductsPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $category = Category::factory()->create();

        $product = Product::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->put(route('admin.products.update', $product), [
            'name' => 'Test name',
            'image' => UploadedFile::fake()->image('products.jpg'),
            'description' => 'Test description',
            'price' => 1000,
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        $this->assertCount(1, Product::all());

        $product = $product->fresh();

        //Assert
        $response->assertRedirect('/products');
        $this->assertAuthenticated();
        $this->assertEquals('Test name', $product->name);
        $this->assertEquals('Test description', $product->description);
        $this->assertEquals(1000, $product->price);
        $this->assertEquals(10, $product->stock);
        $this->assertEquals($category->id, $product->category->id);
    }
}
