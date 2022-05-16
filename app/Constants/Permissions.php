<?php

namespace App\Constants;

use MyCLabs\Enum\Enum;

class Permissions extends Enum
{
    public const USER_LIST = 'user-list';
    public const USER_CREATE = 'user-create';
    public const USER_EDIT = 'user-edit';
    public const USER_DELETE = 'user-delete';
    public const PRODUCT_LIST = 'product-list';
    public const PRODUCT_CREATE = 'product-create';
    public const PRODUCT_EDIT = 'product-edit';
    public const PRODUCT_DELETE = 'product-delete';
    public const ROLE_LIST = 'role-list';
    public const ROLE_CREATE = 'role-create';
    public const ROLE_EDIT = 'role-edit';
    public const ROLE_DELETE = 'role-delete';

    public static function supported(): array
    {
        return collect(static::toArray())->values()->toArray();
    }
}
