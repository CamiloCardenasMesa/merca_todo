<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($role->name) }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-gray-100 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="px-10 pb-8 pt-10 bg-white border-b border-gray-200">
                    <div class="bg-gray-100 border border-gray-300 px-4 py-2 text-center font-bold rounded-lg">
                        {{ $role->name }}   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="bg-white text-center my-4">
                                <p>{{ trans('auth.permissions') }}</p>
                            </div>
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
                    <div class="flex justify-center gap-2 mt-6">
                        <x-button-link href="{{ route('roles.index') }}">{{ trans('buttons.back') }}</x-button-link>
                        @can(App\Constants\Permissions::ROLE_EDIT)
                        <x-button-link href="{{ route('roles.edit', $role) }}">{{ trans('buttons.edit') }}</x-button-link>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
