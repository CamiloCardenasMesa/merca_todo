<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserOrdersTest extends TestCase
{
    public function testUserHasManyOrders(): void
    {
        $user = new User();
        $this->assertInstanceOf(Collection::class, $user->orders);
    }
}
