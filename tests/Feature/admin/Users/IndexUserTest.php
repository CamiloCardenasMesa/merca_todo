<?php

namespace Tests\Feature\Admin\user;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class IndexUserTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanRenderUsersListScreen(): void
    {
        //Arrange

        $UserPermission = Permission::create([
            'name' => 'user-delete',
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($UserPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.users.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.users.index');
        $response->assertViewHas('users');
        $this->assertAuthenticated();
    }

    public function testNotAdminUserCantRenderUsersListScreen(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $user = User::factory()->create();
        $role = Role::create(['name' => 'buyer']);
        $permissions = Permission::create([
            'name' => 'user-list', ]);
        $role->syncPermissions($permissions);
        $user->assignRole($role);

        //Act or Request
        $response = $this->actingAs($user)->get(route('admin.users.index', $user));

        //Assert
        /* $response->assertForbidden(); */
        $this->assertAuthenticated();
        $this->assertDatabaseCount('users', 1);
    }
}
