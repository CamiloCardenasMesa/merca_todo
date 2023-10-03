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
            'password' =>'programacion123',
            'phone' => '3016569188',
            'birthday' => '1998-05-30',
            'address' => 'Calle 51 # 82 - 190 bloque 8 apto 911',
            'city' => 'Medellín',
            'country' => 'Colombia',
        ]);

        $user->assignRole(Roles::ADMIN);
    }
}
