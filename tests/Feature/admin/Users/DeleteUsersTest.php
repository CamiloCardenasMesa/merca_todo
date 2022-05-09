<?php

namespace Tests\Feature;

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
        $user = User::factory()->create();
        $role = Role::create(['name' => 'guest']);
        $permissions = Permission::create([
            'name' => 'user-delete', ]);
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        //Act or Request
        $response = $this->actingAs($user)->delete(route('admin.users.destroy', $user));

        //Assert
        $response->assertRedirect('/admin/users');
        $this->assertAuthenticated();
        $this->assertCount(0, User::all());
    }
}
