<?php

namespace Tests\Feature\admin\Users;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testItCanCreateAnUser()
    {
        // Arrange
        $userService = new UserService();

        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'phone' => '123456789',
            'birthday' => '1990-01-01',
            'address' => '123 Main St',
            'city' => 'City',
            'country' => 'Country',
        ];

        // Act
        $user = $userService->createUser($userData);

        // Assert
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($userData['name'], $user->name);
        $this->assertEquals($userData['email'], $user->email);
        $this->assertTrue(Hash::check($userData['password'], $user->password));
        $this->assertEquals($userData['phone'], $user->phone);
        $this->assertEquals($userData['birthday'], $user->birthday);
        $this->assertEquals($userData['address'], $user->address);
        $this->assertEquals($userData['city'], $user->city);
        $this->assertEquals($userData['country'], $user->country);
    }
}
