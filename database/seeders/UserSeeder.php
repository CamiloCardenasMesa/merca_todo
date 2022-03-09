<?php

namespace Database\Seeders;

use App\Constants\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        $admin->assignRole(Roles::ADMIN);

        $users = User::factory(100)->create();
        foreach ($users as $user) {
            $user->assignRole(Roles::BUYER);
        }
    }
}
