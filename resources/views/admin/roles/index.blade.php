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
                            <td class="border-b">
                                <x-show-button route="{{ route('roles.show', $role) }}" />
                            </td>
                            @endcan
                            
                            @can(App\Constants\Permissions::ROLE_EDIT)
                            <td class="border-b">
                                <x-edit-button route="{{ route('roles.edit', $role) }}" />
                            </td> 
                            @endcan
                           
                            @can(App\Constants\Permissions::ROLE_DELETE)
                            <td class="border-b">
                                <x-delete-button route="{{ route('roles.destroy', $role) }}" textConfirm="return confirm('{{ trans('auth.delete_role') }}')" />
                            </td> 
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-article-layout>
</x-app-layout>
