<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('users.users_list') }}
            <x-auth-session-status :status="session('status')" />
        </div>
    </x-slot>

    <x-article-layout>
        <div class="flex justify-between items-center">
            <div>
                <form action="{{ route('admin.users.index') }}" method="GET">
                    <x-input type="text" name="query" placeholder="{{ trans('placeholders.user_search') }}" />
                    <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
                </form>
            </div>
            <div>
                @can(App\Constants\Permissions::USER_CREATE)
                    <div>
                        <x-button-link href="{{ route('admin.users.create') }}">
                        {{ trans('buttons.create_user') }}
                        </x-button>
                    </div>
                @endcan
            </div>
        </div>
        <table class="container mt-8">
            <thead>
                <tr class="bg-gray-100 ">
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.name') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.email') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                    @can(App\Constants\Permissions::USER_SHOW)
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
                        @can(App\Constants\Permissions::USER_SHOW)
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
    </x-article-layout>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        {{ $users->links() }}
    </div>  

</x-app-layout>
