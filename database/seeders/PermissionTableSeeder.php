<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'user-list', 'description' => 'Can see the users list'],
            ['name' => 'user-create', 'description' => 'Can create a user'],
            ['name' => 'user-edit', 'description' => 'Can edit a user'],
            ['name' => 'user-delete', 'description' => 'Can delete a user'],
            ['name' => 'role-list', 'description' => 'Can see the role list'],
            ['name' => 'role-create', 'description' => 'Can create a role'],
            ['name' => 'role-edit', 'description' => 'Can edit a role'],
            ['name' => 'role-delete', 'description' => 'Can delete a role'],
            ['name' => 'product-list', 'description' => 'Can see the product list'],
            ['name' => 'product-create', 'description' => 'Can create a product'],
            ['name' => 'product-edit', 'description' => 'Can edit a product'],
            ['name' => 'product-delete', 'description' => 'Can delete a product'],
        ];

        foreach ($permissions as $permission) {
            $permissionModel = Permission::create(['name' => $permission['name']]);
            $permissionModel->description = $permission['description'];
            $permissionModel->save();
        }
    }
}
