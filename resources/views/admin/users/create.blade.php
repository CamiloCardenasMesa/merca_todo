<x-app-layout>
    <x-slot name="header">
        <div>
            {{ trans('auth.header') }}
        </div>
    </x-slot>

    <x-article-layout>
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-section>    
                <x-input-field label="{{ trans('auth.name') }}" type="text" name="name" />
                <x-input-field label="{{ trans('auth.email') }}" type="email" name="email" />
                <x-input-field label="{{ trans('auth.password') }}" type="password" name="password"/>
                <x-input-field label="{{ trans('auth.confirm_password') }}" type="password" name="confirm_password" />
                <x-input-field label="{{ trans('users.phone') }}" type="text" name="phone"/>
                <x-input-field label="{{ trans('users.address') }}" type="text" name="address"/>
                <x-input-field label="{{ trans('users.birthday') }}" type="date" name="birthday"/>
                <x-input-field label="{{ trans('users.city') }}" type="text" name="city" />
                <x-input-field label="{{ trans('users.country') }}" type="text" name="country" />
                <div class="flex flex-grow flex-col">
                    <x-label for="roles">{{ trans('auth.role') }}</x-label>
                    <x-select name="roles" id="roles" 
                        :options="[
                            'admin' => __('role.admin'),
                            'guest' => __('role.guest'),
                            'buyer' => __('role.buyer'),
                        ]" 
                    />
                </div>
            </x-section>
            <x-create-form-buttons route="{{ route('admin.users.index') }}" />
        </form>
    </x-article-layout>
</x-app-layout>

