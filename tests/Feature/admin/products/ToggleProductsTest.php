<?php

namespace Tests\Feature\admin\products;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ToggleProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanEnableProducts(): void
    {
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $admin->assignrole($role);

        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->put(route('admin.products.toggle', $product));

        $response->assertRedirect('/products');
        $this->assertAuthenticated();
        $this->assertFalse(!$product->enable);
        $this->assertTrue($product->enable);
    }
}
