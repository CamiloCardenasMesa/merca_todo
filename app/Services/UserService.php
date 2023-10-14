<?php

namespace App\Services;

use App\Models\User;

class UserService 
{
    public function CreateUser(array $userData): User 
    {
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
            'phone' => $userData['phone'],
            'birthday' => $userData['birthday'],
            'address' => $userData['address'],
            'city' => $userData['city'],
            'country' => $userData['country'],
        ]);

        return $user;
    }
}
