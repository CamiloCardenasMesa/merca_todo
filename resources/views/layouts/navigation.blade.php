<nav>
    <div>
        <ul class="flex flex-col flex-grow gap-y-3 font-medium">
            @can(
            App\Constants\Permissions::PRODUCT_LIST,
            App\Constants\Permissions::PRODUCT_CREATE,
            App\Constants\Permissions::PRODUCT_EDIT,
            App\Constants\Permissions::PRODUCT_DELETE,
            )
            <li>
                <x-nav-link :href="route('admin.products.index')" :active="Str::startsWith(request()->route()->getName(), 'admin.products.')">
                    <div class="col-span-3 lg:col-span-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                        </svg>
                    </div>
                    <div class="col-span-9 lg:col-span-10">
                        {{ trans('navigation.product_list') }}
                    </div>
                </x-nav-link>
            </li>
            @endcan

            @can(
                App\Constants\Permissions::ORDER_LIST,
                App\Constants\Permissions::ORDER_SHOW,
            )
            <li>
                <x-nav-link :href="route('buyer.orders.index')" :active="Str::startsWith(request()->route()->getName(), 'buyer.orders')">
                    <div class="col-span-3 lg:col-span-2 grid content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 lg:col-span-10">
                        {{ trans('navigation.orders') }}
                    </div>
                </x-nav-link>
            </li>
            @endcan

            @can(
                App\Constants\Permissions::USER_LIST,
                App\Constants\Permissions::USER_CREATE,
                App\Constants\Permissions::USER_EDIT,
                App\Constants\Permissions::USER_DELETE,
            )
            <li>
                <x-nav-link :href="route('admin.users.index')" :active="Str::startsWith(request()->route()->getName(), 'admin.users')">
                    <div class="col-span-3 lg:col-span-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 lg:col-span-10">
                        {{ trans('navigation.users') }}
                    </div>
                </x-nav-link>
            </li>
            @endcan

            @can(
                App\Constants\Permissions::ROLE_LIST,
                App\Constants\Permissions::ROLE_CREATE,
                App\Constants\Permissions::ROLE_EDIT,
                App\Constants\Permissions::ROLE_DELETE,
            )
            <li>
                <x-nav-link :href="route('roles.index')" :active="Str::startsWith(request()->route()->getName(), 'roles')">
                    <div class="col-span-3 lg:col-span-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="col-span-9 lg:col-span-10">
                        {{ trans('navigation.roles') }}
                    </div>
                </x-nav-link>
            </li>
            @endcan
        </ul> 
    </div> 
</nav>