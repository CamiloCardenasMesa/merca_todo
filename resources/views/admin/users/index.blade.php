<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <form class="flex justify-between" action="{{ route('admin.users.index') }}" method="GET">
                <x-input type="text" name="query" placeholder="{{ trans('placeholders.user_search') }}" />
                <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
            </form>
            <x-auth-session-status class="flex text-center" :status="session('status')" />
        </div>
    </x-slot>
    <div class="pt-6 pb-14 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can(App\Constants\Permissions::USER_CREATE)
                <div class="mb-6">
                    <x-button-link href="{{ route('admin.users.create') }}">
                        {{ trans('buttons.create_user') }}
                    </x-button>
                </div>
            @endcan
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100 ">
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.name') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.email') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                                @can(App\Constants\Permissions::USER_LIST)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.show') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::USER_EDIT)
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                    <th class="border border-gray-300 px-4 py-2">{{ trans('buttons.state') }}</th>
                                @endcan
                                @can(App\Constants\Permissions::USER_DELETE)
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
                                            @foreach ($user->getRoleNames() as $role)
                                                <label class="badge badge-success">{{ $role }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    @can(App\Constants\Permissions::USER_LIST)
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('admin.users.show', $user) }}">
                                                {{ trans('buttons.show') }}
                                            </x-button-link>
                                        </td>
                                    @endcan
                                    @can(App\Constants\Permissions::USER_EDIT)
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <x-button-link href="{{ route('admin.users.edit', $user) }}">
                                                {{ trans('buttons.edit') }}
                                            </x-button-link>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('admin.users.toggle', $user) }}" method="POST">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <x-button type="submit">
                                                    {{ $user->enable ? trans('buttons.disable') : trans('buttons.enable') }}
                                                </x-button>
                                            </form>
                                        </td>
                                    @endcan
                                    @can(App\Constants\Permissions::USER_DELETE)
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <x-button href="{{ route('admin.users.index', $user) }}" onclick="return confirm ('{{ trans('auth.delete_user') }}')">
                                                    {{ trans('buttons.delete') }}
                                                </x-button>
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
