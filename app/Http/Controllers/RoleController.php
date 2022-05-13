<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Role\RoleStoreRequest;
use App\Http\Requests\Admin\Role\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /* public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    } */

    public function index(Request $request): View
    {
        $roles = Role::orderBy('id', 'desc')
            ->paginate(5);

        return view('roles.index', compact('roles'));
    }

    public function create(): View
    {
        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }

    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('status', 'Role created successfully');
    }

    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(RoleUpdateRequest $request, $id): RedirectResponse
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('status', 'Role updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table('roles')
            ->where('id', $id)
            ->delete();

        return redirect()->route('roles.index')
                        ->with('status', 'Role deleted successfully');
    }
}
