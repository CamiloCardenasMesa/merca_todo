<?php

namespace Tests\Feature\Buyer\Cart;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DestroyCartTest extends TestCase
{
    use RefreshDatabase;

    public function testProductCanBeDeleted(): void
    {
        $deleteProductPermission = Permission::create([
            'name' => Permissions::PRODUCT_DELETE,
        ]);

        $adminRole = Role::create(['name' => Roles::SUPER_ADMIN])
            ->givePermissionTo($deleteProductPermission);

        $product = Product::factory()->create();

        $admin = User::factory()->create()->assignRole($adminRole);

        $cartItem = Cart::add($product, 1, ['image' => $product->image, 'description' => $product->description]);
        $response = $this->actingAs($admin)->delete(route('buyer.cart.destroy', $cartItem->rowId));

        $this->assertAuthenticated();
        $response->assertRedirect();
        $this->assertEquals(0, Cart::count());
    }
}
