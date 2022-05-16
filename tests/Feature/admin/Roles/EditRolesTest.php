<?php

namespace Tests\Feature\admin\Roles;

use App\Constants\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class EditRolesTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanShowEditRoleView(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $updatePermission = Permission::create([
            'name' => Permissions::ROLE_EDIT, ]);

        $adminRole = Role::create(['name' => 'admin'])
            ->givePermissionTo($updatePermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $userEdited = Role::create(['name' => 'guest']);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('roles.edit', $userEdited));

        //Assert
        $response->assertOk();
        $response->assertViewIs('roles.edit');
        $response->assertViewHas('role');
        $this->assertAuthenticated();
    }
}
