<?php

namespace Tests\Feature\admin\Roles;

use App\Constants\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ShowRolesTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanRenderShowRoleScreen(): void
    {
        //Arrange
        $UserPermission = Permission::create([
            'name' => Permissions::ROLE_LIST,
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($UserPermission);

        $admin = User::factory()
            ->create()
            ->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)
            ->get(route('roles.show', $admin));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.roles.show');
        $response->assertViewHas('role');
        $this->assertAuthenticated();
    }

    public function testAdminUserCanDeleteRole(): void
    {
        //Arrange
        $deletePermission = Permission::create([
            'name' => Permissions::ROLE_DELETE, ]);

        $adminRole = Role::create(['name' => 'admin'])
            ->givePermissionTo($deletePermission);
        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->delete(route('roles.destroy', $admin));

        //Assert
        $response->assertRedirect('admin/roles');

        $this->assertAuthenticated();
    }
}
