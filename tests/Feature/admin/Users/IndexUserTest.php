<?php

namespace Tests\Feature\Admin\user;

use App\Constants\Permissions;
use App\Constants\Roles;
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
            'name' => Permissions::USER_INDEX,
        ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
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
        //Arrange

        $buyerRole = Role::create(['name' => Roles::BUYER]);

        $user = User::factory()->create()->assignRole($buyerRole);

        //Act or Request
        $response = $this->actingAs($user)->get(route('admin.users.index'));

        //Assert
        $response->assertForbidden();
        $this->assertAuthenticated();
        $this->assertDatabaseCount('users', 1);
    }
}
