<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class Roles extends Enum
{
    public const BUYER = 'buyer';
    public const ADMIN = 'admin';
    public const ADMIN_2 = 'admin_2';
    public const GUEST = 'guest';

    public static function supported(): array
    {
        return collect(static::toArray())->values()->toArray();
    }
}
