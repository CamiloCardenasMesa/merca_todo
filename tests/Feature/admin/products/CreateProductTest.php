<?php

namespace Tests\Feature\admin\products;

use App\Constants\Permissions;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProductCreateViewCanRender(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $user = User::factory()->create();
        $role = Role::create(['name' => 'admin_1']);
        $permissions = Permission::create([
            'name' => Permissions::PRODUCT_CREATE, ]);
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //Act or Request
        $response = $this->actingAs($user)->get(route('admin.products.create'));

        //Assert
        $response->assertViewIs('admin.products.create');
        $response->assertViewHas('categories');
    }

    public function testAdminUserCanCreateProducts(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $user = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::create([
            'name' => Permissions::PRODUCT_CREATE, ]);
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $category = Category::factory()->create();

        //Act or Request
        $response = $this->actingAs($user)->post('admin/products/store', [
            'name' => 'Test name',
            'image' => UploadedFile::fake()->image('products.jpg'),
            'description' => 'Test description',
            'price' => 10000,
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        $product = Product::first();

        //Assert
        $response->assertRedirect('admin/products');
        $this->assertEquals('Test name', $product->name);
        $this->assertEquals('Test description', $product->description);
        $this->assertEquals(10000, $product->price);
        $this->assertEquals(10, $product->stock);
        $this->assertEquals($category->id, $product->category->id);
        $this->assertEquals(1, Product::count());
    }
}
