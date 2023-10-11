<?php

namespace Database\Seeders;

use App\Constants\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::findByName(Roles::SUPER_ADMIN);
        $admin->syncPermissions(Permission::all());
    }
}
