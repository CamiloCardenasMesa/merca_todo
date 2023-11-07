@auth
    @if ($userHasPermissions)
        <aside id="nav-menu" class="text-white md:block hidden bg-aside-gray px-3 lg:px-6 w-80"> 
            <div class="flex items-center justify-center my-4 lg:my-0">
                @include('layouts.login')
            </div>
            <div>
                @include('layouts.navigation')
            </div>
        </aside>
    @endif
@endauth