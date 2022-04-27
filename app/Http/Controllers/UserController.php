<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->query('query')) {
            $users = User::where('name', 'like', '%' . $request->query('query') . '%')
            ->orwhere('email', 'like', '%' . $request->query('query') . '%')
            ->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function toggle(User $user): RedirectResponse
    {
        $user->enable = !$user->enable;

        $user->save();

        return redirect()->route('admin.users.index');
    }
}
