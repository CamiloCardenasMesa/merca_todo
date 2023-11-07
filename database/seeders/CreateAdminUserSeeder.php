<?php

namespace Database\Seeders;

use App\Constants\Roles;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function run(): void
    {
        $superAdminData = [
            'name' => 'Valentina Luna',
            'email' => 'superAdmin@email.com',
            'password' => 'password',
            'phone' => '3016569188',
            'birthday' => '1998-05-30',
            'address' => 'Calle 51 # 82 - 190 bloque 8 apto 911',
            'city' => 'Medellín',
            'country' => 'Colombia',
        ];

        $superAdmin = $this->userService->CreateUser($superAdminData);
        $superAdmin->assignRole(Roles::SUPER_ADMIN);

        $adminData = [
            'name' => 'Camilo Mesa',
            'email' => 'admin@email.com',
            'password' => 'password',
            'phone' => '3190005566',
            'birthday' => '1989-03-09',
            'address' => 'Avenida siempre viva',
            'city' => 'Sprinfield',
            'country' => 'Far Far Away',
        ];

        $admin = $this->userService->CreateUser($adminData);
        $admin->assignRole(Roles::ADMIN);
    }
}
