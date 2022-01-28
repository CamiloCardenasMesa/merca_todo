<?php

namespace Database\Seeders;

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
            'name' => 'Camilo',
            'email' => 'arqcamilocardenasmesa@gmail.com',
        ]);

        $admin->assignRole('admin');

        $users = User::factory(100)->create();
        foreach ($users as $user) {
            $user->assignRole('buyer');
        }
    }
}
