<?php

namespace Tests\Feature\admin\products;

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

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function testProductCreateViewCanRender(): void
    {
        //Arrange
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $admin->assignRole($role);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.products.create'));

        //Assert
        $response->assertViewIs('admin.products.create');
        $response->assertViewHas('categories');
    }

    public function testAdminUserCanCreateProducts(): void
    {
        //Arrange
        $productsPermission = Permission::create([
            'name' => Permissions::CREATE_PRODUCTS,
        ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
        ->givePermissionTo($productsPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $category = Category::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->post('/products/store', [
            'name' => 'Test name',
            'image' => UploadedFile::fake()->image('products.jpg'),
            'description' => 'Test description',
            'price' => 1000,
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        $product = Product::first();

        //Assert
        $response->assertRedirect('/products'); //status302
        $this->assertEquals('Test name', $product->name);
        $this->assertEquals('Test description', $product->description);
        $this->assertEquals(1000, $product->price);
        $this->assertEquals(10, $product->stock);
        $this->assertEquals($category->id, $product->category->id);
        $this->assertEquals(1, Product::count());
    }
}
