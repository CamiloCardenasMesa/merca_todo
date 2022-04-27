<?php

namespace Tests\Feature\admin\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ToggleUsersTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminUserCanEnableUsers(): void
    {
        $admin = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $admin->assignrole($role);

        $response = $this->actingAs($admin)->put(route('admin.users.toggle', $admin));

        $response->assertRedirect('/admin/users');
        $this->assertAuthenticated();
        $this->assertFalse(!$admin->enable);
        $this->assertTrue($admin->enable);
    }
}