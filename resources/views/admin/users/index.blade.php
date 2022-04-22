<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(trans('auth.users')) }}
        </h2>
    </x-slot>

    <div class="pt-6 pb-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.users.index') }}" method="GET">
                <x-input type="text" name="query" placeholder="{{ trans('placeholders.user_search') }}" />
                <x-button class="ml-2">{{ trans('buttons.search') }}</x-button>
            </form><br>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-8 bg-white border-b border-gray-200">
                    <table class="container">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-400 px-4 py-2">{{ trans('auth.name') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('auth.email') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('auth.verificated_at') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.show') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.edit') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.state') }}</th>
                                <th class="border border-gray-400 px-4 py-2">{{ trans('buttons.delete') }}</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $user->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">{{ $user->email }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-left">
                                        {{ $user->email_verified_at }}</td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.users.show', $user) }}">
                                            {{ trans('buttons.show') }}</x-button-link>
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-button-link href="{{ route('admin.users.edit', $user) }}">
                                            {{ trans('buttons.edit') }}</x-button-link>
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <x-auth-validation-errors :errors="$errors" />
                                        <form action="{{ route('admin.users.toggle', $user) }}" method="POST">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <x-button type="submit">
                                                {{ $user->enable ? trans('buttons.disable') : trans('buttons.enable') }}
                                            </x-button>
                                        </form>
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2 text-center">
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <x-button href="{{ route('admin.users.index', $user) }}"
                                                onclick="return confirm ('¿Seguro que quieres eliminar este usuario?')">
                                                {{ trans('buttons.delete') }}</x-button>
                                        </form>
                                    </td>
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
