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

    public function testAdminUserCanUpdateUsersListScreen(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $editUserPermission = Permission::create([
                'name' => Permissions::USER_UPDATE,
            ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
            ->givePermissionTo($editUserPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->put(route('admin.users.update', $admin), [
            'name' => 'Test name',
            'email' => 'Test email',
        ]);

        $this->assertCount(1, User::all());

        $admin = $admin->fresh();

        //Assert
        $response->assertRedirect('/admin/users');
        $this->assertAuthenticated();
        $this->assertEquals('Test name', $admin->name);
        $this->assertEquals('Test email', $admin->email);
    }

    public function testAdminUserCanRenderedEditUsersView()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $editProductsPermission = Permission::create([
            'name' => Permissions::USER_EDIT,
        ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
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
