<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('users.permissions_of') . trans('role.' . $role->name) }}
        </h2>
    </x-slot>

    <x-article-layout>
        <div>
            <div class="form-group">
                @if (!count($rolePermissions))
                    <div class="rounded-lg p-2 bg-gray-100 border border-gray-300 text-center">
                        <strong>{{ trans('auth.role_permissions') }}</strong>
                    </div>
                @else
                    <div class="rounded-lg p-2 bg-gray-100 border border-gray-300 ">
                        @foreach ($rolePermissions as $permission)
                            <div class="bg-gray-100 text-left py-2 px-4">
                                <li>{{ $permission->name }}</li>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="flex justify-start gap-2 mt-6">
            <x-button-link href="{{ route('roles.index') }}">{{ trans('buttons.back') }}</x-button-link>
            @can(App\Constants\Permissions::ROLE_EDIT)
            <x-button-link href="{{ route('roles.edit', $role) }}">{{ trans('buttons.edit') }}</x-button-link>
            @endcan
        </div>
    </x-article-layout>
</x-app-layout>
