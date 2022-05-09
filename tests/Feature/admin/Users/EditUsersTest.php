<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class EditUserTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanUpdateUsersListScreen(): void
    {
        /*  $this->withoutExceptionHandling(); */
        //Arrange
        $updatePermission = Permission::create([
            'name' => 'user-edit',
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($updatePermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        $updatedUser = User::factory()->create();

        //Act or Request
        $response = $this->actingAs($admin)->put(route('admin.users.update', $updatedUser), [
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
        /*  dd($response); */
        $updatedUser = $updatedUser->fresh();

        //Assert
        $response->assertRedirect('/');
        $this->assertAuthenticated();
        $this->assertCount(2, User::all());
        $this->assertEquals('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', $updatedUser->password);
    }

    public function testAdminUserCanRenderedEditUsersView()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $editProductsPermission = Permission::create([
            'name' => 'user-edit',
        ]);

        $adminRole = Role::create(['name' => 'admin'])
        ->givePermissionTo($editProductsPermission);

        $admin = User::factory()->create()->assignRole($adminRole);

        //Act or Request
        $response = $this->actingAs($admin)->get(route('admin.users.edit', $admin));

        //Assert
        $response->assertOk();
        $this->assertAuthenticated();
        $response->assertViewIs('admin.users.edit');
    }
}
