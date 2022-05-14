<?php

namespace Tests\Feature;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanUpdateAnUser(): void
    {
        //Arrange
        $updatePermission = Permission::create([
            'name' => Permissions::USER_EDIT,
        ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
        ->givePermissionTo($updatePermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $updatedUser = User::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->put(route('admin.users.update', $updatedUser), [
            'name' => 'nametst',
            'email' => 'email@example.com',
            'password' => '123456',
            'enable' => true,
        ]);

        $updatedUser = $updatedUser->fresh();

        //Assert
        $response->assertRedirect('admin.users.index');
        $this->assertAuthenticated();
        $this->assertCount(1, User::all());
    }

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
