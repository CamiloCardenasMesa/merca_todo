<?php

namespace Tests\Feature\admin\Roles;

use App\Constants\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class UpdateRolesTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserEditRoles(): void
    {
        //Arrange
        $updatePermission = Permission::create([
            'name' => Permissions::ROLE_EDIT, ]);

        $adminRole = Role::create(['name' => 'admin'])
            ->givePermissionTo($updatePermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $userUpdated = Role::create(['name' => 'guest']);

        //Act or Request
        $response = $this->actingAs($admin)->put(route('roles.update', $userUpdated), [
            'name' => 'guest',
            'permission' => Permissions::ROLE_EDIT,
        ]);

        $userUpdated = $userUpdated->fresh();

        //Assert
        $response->assertRedirect('admin/roles');
        $this->assertEquals($userUpdated->name, 'guest');
        $this->assertAuthenticated();
    }
}
