<?php

namespace Tests\Feature\admin\Roles;

use App\Constants\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class CreateRolesTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanShowCreateRoleView(): void
    {
        //Arrange
        $UserPermission = Permission::create([
            'name' => Permissions::ROLE_CREATE,
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($UserPermission);

        $admin = User::factory()
            ->create()
            ->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)
            ->get(route('roles.create'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('roles.create');
        $this->assertAuthenticated();
    }

    public function testAdminUserCanCreateRole(): void
    {
        //Arrange
        $updatePermission = Permission::create([
            'name' => Permissions::ROLE_CREATE, ]);

        $adminRole = Role::create(['name' => 'admin'])
            ->givePermissionTo($updatePermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $userCreated = User::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->post(route('roles.store', $userCreated), [
            'name' => 'guest',
            'permission' => Permissions::ROLE_CREATE,
        ]);

        $userCreated->fresh();

        //Assert
        $response->assertRedirect('admin/roles');
        $this->assertNotEquals($userCreated, $admin);
        $this->assertAuthenticated();
    }
}
