<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class Roles extends Enum
{
    public const BUYER = 'buyer';
    public const ADMIN = 'admin';
    public const GUEST = 'guest';

    public static function supported(): array
    {
        return collect(static::toArray())->values()->toArray();
    }
}
