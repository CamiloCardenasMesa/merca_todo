<x-app-layout>
    <x-slot name="header">
        <form action="{{ route('admin.users.index') }}" method="GET">
            <x-input type="text" name="query" placeholder="{{ trans('placeholders.user_search') }}" />
            <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
        </form>
    </x-slot>

    <div class="pt-6 pb-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('user-create')
                <div class="mb-6">
                    <x-button-link href="{{ route('admin.users.create') }}">{{ trans('buttons.create_user') }}
                        </x-button>
                </div>
            @endcan
            <div>
                <x-auth-session-status :status="session('status')" />
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100 ">
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.name') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.email') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                                @can('user-list')
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can('user-edit')
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.state') }}</th>
                                @endcan
                                @can('user-delete')
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.delete') }}</th>
                                @endcan
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-left">{{ $user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-left">{{ $user->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-left">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    @can('user-list')
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('admin.users.show', $user) }}">
                                                {{ trans('buttons.show') }}</x-button-link>
                                        </td>
                                    @endcan
                                    @can('user-edit')
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('admin.users.edit', $user) }}">
                                                {{ trans('buttons.edit') }}</x-button-link>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-auth-validation-errors :errors="$errors" />
                                            <form action="{{ route('admin.users.toggle', $user) }}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <x-button type="submit">
                                                    {{ $user->enable ? trans('buttons.disable') : trans('buttons.enable') }}
                                                </x-button>
                                            </form>
                                        </td>
                                    @endcan
                                    @can('user-delete')
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <x-button href="{{ route('admin.users.index', $user) }}"
                                                    onclick="return confirm ('{{ trans('auth.delete_user')}}')">
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
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
