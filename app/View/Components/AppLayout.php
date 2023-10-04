<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class AppLayout extends Component
{
    public $userHasPermissions;

    public function __construct()
    {
        $user = Auth::user();

        $this->userHasPermissions = $user && Permission::where('guard_name', 'web')->whereHas('roles', function ($query) use ($user) {
            $query->whereHas('users', function ($query) use ($user) {
                $query->where('users.id', $user->id);
            });
        })->count() > 0;
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}
