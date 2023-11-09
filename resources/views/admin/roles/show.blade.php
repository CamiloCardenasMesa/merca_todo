<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('users.permissions_of') . trans('role.' . $role->name) }}
        </h2>
    </x-slot>

    <x-section-layout>
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
        <x-show-form-buttons route="{{ route('roles.index') }}">
            @can(App\Constants\Permissions::ROLE_EDIT)
            <x-button-actions 
                route="{{ route('roles.edit', $role) }}" 
                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />' 
            /> 
        @endcan
        </x-show-form-buttons>
    </x-section-layout>
</x-app-layout>
