<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('auth.role_list') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <div class="bg-gray-100 min-h-screen pb-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <form action="{{ route('admin.users.index') }}" method="GET">
                                <x-input type="text" name="query" placeholder="{{ trans('placeholders.user_search') }}" />
                                <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
                            </form>
                        </div>
                        <div>
                            @can(App\Constants\Permissions::ROLE_CREATE)
                            <div>
                                <x-button-link href="{{ route('roles.create') }}">
                                    {{ trans('buttons.create_role') }}
                                </x-button-link>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <table class="container mt-8">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                                @can('view', App\Models\Role::class)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::ROLE_EDIT)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::ROLE_DELETE)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        @foreach ($roles as $role)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $role->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $role->name }}</td>
                                    @can('view', $role)
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('roles.show', $role->id) }}">
                                                {{ trans('buttons.show') }}</x-button-link>
                                        </td>
                                    @endcan
                                    @can('update', $role)
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('roles.edit', $role->id) }}">
                                                {{ trans('buttons.edit') }}</x-button-link>
                                        </td>
                                    @endcan
                                    @can(App\Constants\Permissions::ROLE_DELETE)
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <x-button href="{{ route('roles.index', $role->id) }}"
                                                    onclick="return confirm ('{{ trans('auth.delete_role') }}')">
                                                    {{ trans('buttons.delete') }}</x-button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            {{ $roles->links() }}
        </div>
    </div>
</x-app-layout>
