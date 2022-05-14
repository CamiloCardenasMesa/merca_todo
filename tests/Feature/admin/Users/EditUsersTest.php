<?php

namespace Tests\Feature;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanRenderedEditUsersView()
    {
        //Arrange
        $editProductsPermission = Permission::create([
            'name' => Permissions::USER_EDIT,
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($editProductsPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.users.edit', $admin));

        //Assert
        $response->assertOk();
        $this->assertAuthenticated();
        $response->assertViewIs('admin.users.edit');
    }
}
