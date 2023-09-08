<?php

namespace Database\Seeders;

use App\Constants\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Valentina Luna',
            'email' => 'GeneralManager@gmail.com',
            'password' =>"programacion123",
        ]);

        $user->assignRole(Roles::ADMIN);
    }
}
