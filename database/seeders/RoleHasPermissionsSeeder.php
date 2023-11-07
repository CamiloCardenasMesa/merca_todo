<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use App\Constants\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $this->syncRoleWithPermissions(Roles::SUPER_ADMIN, Permissions::supported());
        $this->syncRoleWithPermissions(Roles::ADMIN, [
            Permissions::USER_LIST,
            Permissions::USER_SHOW,
            Permissions::USER_CREATE,
            Permissions::PRODUCT_LIST,
            Permissions::PRODUCT_SHOW,
            Permissions::PRODUCT_CREATE,
            Permissions::ORDER_LIST,
            Permissions::ORDER_SHOW,
        ]);
        $this->syncRoleWithPermissions(Roles::BUYER, [
            Permissions::ORDER_LIST,
            Permissions::ORDER_SHOW,
        ]);
    }

    private function syncRoleWithPermissions($roleName, $permissions)
    {
        $role = Role::findByName($roleName);
        $permissionsToSync = Permission::whereIn('name', $permissions)->get();
        $role->syncPermissions($permissionsToSync);
    }
}
