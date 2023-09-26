<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('users.user') . $user->name }}
        </h2>
    </x-slot>

    <x-article-layout>
        <table class="container mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Id</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.name') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.email') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.verificated_at') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.created_at') }}</th>
                    <th class="border border-gray-300 px-4 py-2">{{ trans('auth.updated_at') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->id }}</th>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $role)
                                <label>
                                    {{ trans('role.' . $role) }}
                                </label>
                            @endforeach
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->email_verified_at }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->created_at }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-center gap-2">
            <x-button-link href="{{ route('admin.users.index') }}">{{ trans('buttons.back') }}</x-button-link>
            @can(App\Constants\Permissions::USER_EDIT)
            <x-button-link href="{{ route('admin.users.edit', $user) }}">{{ trans('buttons.edit') }}</x-button-link>
            @endcan
        </div>
    </x-article-layout>
</x-app-layout>
