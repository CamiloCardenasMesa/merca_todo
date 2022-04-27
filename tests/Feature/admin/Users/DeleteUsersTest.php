<?php

namespace Tests\Feature;

use App\Constants\Permissions;
use App\Constants\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DeleteUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanDeleteUsers(): void
    {
        $this->withoutExceptionHandling();
        //Arrange
        $permissionToDeleteUsers = Permission::create(['name' => Permissions::USER_DESTROY]);

        $adminRole = Role::create(['name' => Roles::ADMIN])
        ->givePermissionTo($permissionToDeleteUsers);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $admin));

        //Assert
        $response->assertRedirect('/admin/users');
        $this->assertAuthenticated();
        $this->assertCount(0, User::all());
    }
}
