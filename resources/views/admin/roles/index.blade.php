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
            <x-button-actions
                route="{{ route('roles.create') }}"
                hoverBgClass="hover:bg-green-500" 
                svgPath="<path stroke-linecap='round' stroke-linejoin='round' d='M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5' />"
                text="{{ trans('buttons.create_product') }}"
            /> 
            @endcan
        </div>
        <div class="overflow-auto mt-3">
            <table class="container">
                <thead>
                    <tr class="bg-gray-200 text-left border-y border-gray-300 text-gray-600">
                        <th class="border-b border-gray-300 px-4 py-2">ID</th>
                        <th class="border-b border-gray-300 px-4 py-2">{{ trans('auth.role') }}</th>
                        @can(App\Constants\Permissions::ROLE_SHOW)
                            <th class="border-b border-gray-300 py-2">{{ trans('buttons.show') }}</th>
                        @endcan
                        @can(App\Constants\Permissions::ROLE_EDIT)
                            <th class="border-b border-gray-300 py-2">{{ trans('buttons.edit') }}</th>
                        @endcan
                        @can(App\Constants\Permissions::ROLE_DELETE)
                            <th class="border-b border-gray-300 py-2">{{ trans('buttons.delete') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr class="even:bg-gray-100 odd:bg-white text-gray-700">
                            <td class="border-b px-4 py-2 ">{{ $role->id }}</td>
                            <td class="border-b px-4 py-2 ">{{ trans('role.' . $role->name) }}</td>
                            @can(App\Constants\Permissions::ROLE_SHOW)
                            <x-table-cell-actions
                                route="{{ route('roles.show', $role) }}"
                                hoverBgClass="hover:bg-yellow-500" 
                                svgPath="<path stroke-linecap='round' stroke-linejoin='round' d='M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z' />
                                    <path stroke-linecap='round' stroke-linejoin='round' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z' />" 
                            />
                            @endcan
                            @can(App\Constants\Permissions::ROLE_EDIT)
                            <x-table-cell-actions 
                                route="{{ route('roles.edit', $role) }}" 
                                hoverBgClass="hover:bg-blue-500" 
                                svgPath='<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />' 
                            /> 
                            @endcan
                            @can(App\Constants\Permissions::ROLE_DELETE)
                                <td class="border-b">
                                    <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm ('{{ trans('auth.delete_role') }}')" class="flex p-2 border border-gray-500 rounded-xl hover:rounded-3xl hover:bg-red-700 hover:text-white hover:border-white transition-all duration-300 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-article-layout>

</x-app-layout>
