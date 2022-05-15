<?php

namespace App\Policies;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can(Permissions::ROLE_LIST);
    }

    public function view(User $user): bool
    {
        return $user->can(Permissions::ROLE_LIST);
    }

    public function create(User $user): bool
    {
        return $user->can(Permissions::ROLE_CREATE);
    }

    public function update(User $user)
    {
        return $user->can(Permissions::ROLE_EDIT);
    }

    public function delete(User $user)
    {
        return $user->can(Permissions::ROLE_DELETE);
    }
}
