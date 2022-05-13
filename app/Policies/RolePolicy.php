<?php

namespace App\Policies;

use App\Constants\Permissions;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/* class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can(Permissions::ROLE_LIST);
    }

    public function view(User $user, Role $role): bool
    {
        return $user->can(Permissions::ROLE_LIST, $role);
    }

    public function create(User $user): bool
    {
        return $user->can(Permissions::ROLE_CREATE);
    }

    public function update(User $user, Role $role)
    {
        return $user->can(Permissions::ROLE_EDIT, $role);
    }

    public function delete(User $user, Role $role)
    {
        return $user->can(Permissions::ROLE_DELETE, $role);
    }
}
 */
