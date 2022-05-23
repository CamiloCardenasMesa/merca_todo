<?php

namespace App\Policies;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can(Permissions::USER_LIST);
    }

    public function view(User $user): bool
    {
        return $user->can(Permissions::USER_LIST);
    }

    public function create(User $user): bool
    {
        return $user->can(Permissions::USER_CREATE);
    }

    public function update(User $user): bool
    {
        return $user->can(Permissions::USER_EDIT);
    }

    public function delete(User $user): bool
    {
        return $user->can(Permissions::USER_DELETE);
    }

    public function toggle(User $user): bool
    {
        return $user->can(Permissions::USER_EDIT);
    }
}
