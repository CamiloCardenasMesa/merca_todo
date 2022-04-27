<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::findByName('admin');
        $admin->syncPermissions(Permission::all());
    }
}
