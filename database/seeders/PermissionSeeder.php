<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Permissions::supported() as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
