<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('auth.role_list') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <x-article-layout>
        <div class="flex items-center">
            @can(App\Constants\Permissions::ROLE_CREATE)
                <x-button-link class="mb-3" href="{{ route('roles.create') }}">
                    {{ trans('buttons.create_role') }}
                </x-button-link>
            @endcan
        </div>
        <div class="overflow-auto">
            <table class="container">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                        @can(App\Constants\Permissions::ROLE_SHOW)
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
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ trans('role.' . $role->name) }}</td>
                            @can(App\Constants\Permissions::ROLE_SHOW)
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <x-button-link href="{{ route('roles.show', $role->id) }}">
                                        {{ trans('buttons.show') }}
                                    </x-button-link>
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
    </x-article-layout>

</x-app-layout>
