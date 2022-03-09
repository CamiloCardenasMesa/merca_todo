<?php

namespace Tests\Feature\Admin\user;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ShowUserTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanRenderShowUserScreen(): void
    {
        /* $this->withoutExceptionHandling(); */
        //Arrange
        $showUserPermission = Permission::create([
            'name' => Permissions::USER_SHOW,
        ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
        ->givePermissionTo($showUserPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.users.show', $admin));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.users.show');
        $this->assertDatabaseCount('users', 1);
        $this->assertAuthenticated();
    }

    public function testNotAdminUserCantRenderShowUserScreen(): void
    {
        $adminRole = Role::create(['name' => Roles::GUEST]);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.users.show', $admin));

        //Assert
        $response->assertForbidden();
        $this->assertDatabaseCount('users', 1);
        $this->assertAuthenticated();
    }
}
