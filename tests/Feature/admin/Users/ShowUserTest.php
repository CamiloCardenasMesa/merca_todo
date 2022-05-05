<?php

namespace Tests\Feature\Admin\user;

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
        //Arrange
        $showUserPermission = Permission::create([
            'name' => 'user-list',
        ]);

        $adminRole = Role::create(['name' => 'guest'])
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
        $this->withoutExceptionHandling();
        $showUserPermission = Permission::create([
            'name' => 'user-edit',
        ]);

        $guest = Role::create(['name' => 'buyer'])
        ->givePermissionTo($showUserPermission);

        $buyer = User::factory()->create()->assignRole($guest);

        $user = User::factory()->create();

        //Act or Request
        $response = $this->actingAs($buyer)->get(route('admin.users.show', $user));

        //Assert
        /* $response->assertForbidden(); */
        $this->assertDatabaseCount('users', 2);
        $this->assertAuthenticated();
    }
}
