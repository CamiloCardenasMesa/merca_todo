<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request): View
    {
        $query = $request->query('query');

        $users = User::searchByNameOrEmail($query)
            ->orderBy('id', 'desc')
            ->paginate(25);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user): View
    {
        $role = $user->getRoleNames()->first();
        return view('admin.users.show', compact('user', 'role'));
    }

    public function create(): View
    {
        $roles = Role::all()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')
            ->with('status', trans('users.created'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($user->id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.show', $user)
            ->with('status', trans('users.updated'));
    }

    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('status', trans('users.deleted'));
    }

    public function toggle(User $user): RedirectResponse
    {
        $user->enable = !$user->enable;

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('status', trans('users.updated'));
    }
    public function dashboard()
    {
        return view('admin.users.dashboard');
    }
}
