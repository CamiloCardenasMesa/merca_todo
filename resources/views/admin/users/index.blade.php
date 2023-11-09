<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            {{ trans('users.users_list') }}
            <x-auth-session-status :status="session('status')" />
        </div> 
    </x-slot>

    <x-section-layout>
        @if (count($users))
            <div class="flex justify-between grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4">
                <x-search-bar route="{{ route('admin.users.index') }}" placeholder="{{ trans('placeholders.user_search') }}" />
                <div class="flex items-center lg:justify-end sm:justify-start">
                    @can(App\Constants\Permissions::USER_CREATE)
                        <x-button-actions
                            route="{{ route('admin.users.create') }}"
                            svgPath="<path stroke-linecap='round' stroke-linejoin='round' d='M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z' />"                           
                        />    
                    @endcan
                </div>
            </div>
            <div class="overflow-auto">
                <table class="container mt-3">
                    <thead>
                        <tr class="bg-gray-200 text-left border-y border-gray-300 text-gray-600">
                            <th class="border-b border-gray-300 px-4 py-2">{{ trans('auth.name') }}</th>
                            <th class="border-b border-gray-300 px-4 py-2">{{ trans('auth.email') }}</th>
                            <th class="border-b border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                            
                            @can(App\Constants\Permissions::USER_SHOW)
                            <th class="border-b border-gray-300 px-2">{{ trans('buttons.show') }}</th>
                            @endcan
                           
                            @can(App\Constants\Permissions::USER_EDIT)
                            <th class="border-b border-gray-300 px-2">{{ trans('buttons.edit') }}</th>
                            @endcan
                            
                            @can(App\Constants\Permissions::USER_DELETE)
                            <th class="border-b border-gray-300 px-2">{{ trans('buttons.delete') }}</th>
                            @endcan
                            
                            @can(App\Constants\Permissions::USER_EDIT)
                            <th class="border-b border-gray-300 px-2">{{ trans('buttons.state') }}</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                                <td class="border-b px-4 py-2 text-left">{{ $user->name }}</td>
                                <td class="border-b px-4 py-2 text-left">{{ $user->email }}</td>
                                <td class="border-b px-4 py-2 text-left">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $role)
                                            <span>
                                                {{ trans('role.' . $role) }}
                                            </span>
                                        @endforeach
                                    @endif
                                </td>
                                @can(App\Constants\Permissions::USER_SHOW)
                                <td class="border-b px-2">
                                    <x-show-button route="{{ route('admin.users.show', $user) }}" />
                                </td>
                                @endcan 
                                @can(App\Constants\Permissions::USER_EDIT)
                                <td class="border-b px-2">
                                    <x-edit-button route="{{ route('admin.users.edit', $user) }}" />
                                </td>                                     
                                @endcan
                                @can(App\Constants\Permissions::USER_DELETE)
                                <td class="border-b px-2">
                                    <x-delete-button 
                                        route="{{ route('admin.users.destroy', $user) }}" 
                                        textConfirm="return confirm('{{ trans('users.delete') }}')" 
                                    />
                                </td>                                     
                                @endcan
                                @can(App\Constants\Permissions::USER_EDIT)
                                <td class="border-b px-2">
                                    <x-toggle-button 
                                        route="{{ route('admin.users.toggle', $user) }}" 
                                        status="{{ $user->enable ? 'checked' : '' }}" 
                                    />
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <x-search-failure
                search-failure-text="{{ trans('products.search_failure') }}"  
                back-button-text="{{ trans('buttons.back') }}"
                route="{{ route('admin.users.index') }}"
            />
        @endif
    </x-section-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        {{ $users->links() }}
    </div>  
</x-app-layout>
