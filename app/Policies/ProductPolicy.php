<?php

namespace App\Policies;

use App\Constants\Permissions;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can(Permissions::PRODUCT_LIST);
    }

    public function view(User $user)
    {
        return $user->can(Permissions::PRODUCT_LIST);
    }

    public function create(User $user)
    {
        return $user->can(Permissions::PRODUCT_CREATE);
    }

    public function update(User $user)
    {
        return $user->can(Permissions::PRODUCT_EDIT);
    }

    public function delete(User $user)
    {
        return $user->can(Permissions::PRODUCT_DELETE);
    }

    public function toggle(User $user)
    {
        return $user->can(Permissions::PRODUCT_EDIT);
    }

}
