<?php

namespace Tests\Feature\admin\Roles;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanShowCreateUserView(): void
    {
        //Arrange
        $UserPermission = Permission::create([
            'name' => Permissions::USER_CREATE,
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($UserPermission);

        $admin = User::factory()
            ->create()
            ->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)
            ->get(route('admin.users.create'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.users.create');
        $this->assertAuthenticated();
    }

    public function testAdminUserCanCreateAnUser(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $CreateUserPermission = Permission::create([
            'name' => Permissions::USER_CREATE, ]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
            ->givePermissionTo($CreateUserPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $userCreated = User::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->post(route('admin.users.store', $userCreated), [
            'name' => 'Test Name',
            'email' => 'test@example.com',
            'password' => 'password',
            'role' => Roles::GUEST,
        ]);

        $userCreated = User::first();

        //Assert
        $response->assertRedirect('admin.users.index');
        $this->assertDatabaseCount('users', 1);
        $this->assertAuthenticated();
    }
}
