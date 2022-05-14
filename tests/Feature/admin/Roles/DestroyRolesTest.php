<?php

namespace Tests\Feature\admin\Roles;

use App\Constants\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class DestroyRolesTest extends TestCase
{
    use RefreshDatabase;

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
        $response->assertRedirect('/roles');
        $this->assertAuthenticated();
        $this->assertCount(0, Role::all());
    }
}
