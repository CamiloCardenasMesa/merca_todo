<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('auth.role_list') }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <x-button-link href="{{ route('roles.create') }}">{{ trans('buttons.create_role') }}
                    </x-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 px-4 py-2">ID</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('auth.role') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.show') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.delete') }}</th>
                            </tr>
                        </thead>
                        @foreach ($roles as $role)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2 text-center">{{ $role->id }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">{{ $role->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('roles.show', $role->id) }}">
                                            {{ trans('buttons.show') }}</x-button-link>
                                    </td>
                                    @can('role-edit')
                                        <td class="border border-gray-400 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('roles.edit', $role->id) }}">
                                                {{ trans('buttons.edit') }}</x-button-link>
                                        </td>
                                    @endcan
                                    @can('role-delete')
                                        <td class="border border-gray-400 px-4 py-2 text-center">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <x-button href="{{ route('roles.index', $role->id) }}"
                                                    onclick="return confirm ('¿Seguro que quieres eliminar este rol?')">
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
