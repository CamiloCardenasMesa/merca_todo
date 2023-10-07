<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Role\RoleRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    public function index(Request $request): View
    {
        $roles = Role::orderBy('id', 'desc')
            ->paginate(5);

        return view('admin.roles.index', compact('roles'));
    }

    public function create(): View
    {
        $permission = Permission::get();

        return view('admin.roles.create', compact('permission'));
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('status', trans('auth.created_role'));
    }

    public function show(Role $role): View
    {
        $rolePermissions = $role->permissions;

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit(Role $role): View
    {
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('status', trans('auth.updated_role'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        DB::table('roles')
            ->where('id', $role->id)
            ->delete();

        return redirect()->route('roles.index')
                        ->with('status', trans('auth.deleted_role'));
    }
}
