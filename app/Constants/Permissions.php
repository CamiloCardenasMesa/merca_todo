<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class Permissions extends Enum
{
    public const USER_UPDATE = 'user.update';
    public const USER_SHOW = 'user.show';
    public const USER_DESTROY = 'user.destroy';
    public const USER_INDEX = 'user.index';

    public static function supported(): array
    {
        return collect(static::toArray())->values()->toArray();
    }
}
