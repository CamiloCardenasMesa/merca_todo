<?php

namespace Database\Seeders;

use App\Constants\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(50)->create();
        foreach ($users as $user) {
            $user->assignRole(Roles::BUYER);
        }
    }
}
