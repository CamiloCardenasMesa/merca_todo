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
                <div class="flex flex-grow flex-col">
                    <x-label for="name">{{ trans('auth.name') }}</x-label>
                    <x-input type="text" name="name" id="name" value="{{ old('name') }}"/>
                    @error('name')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="email">{{ trans('auth.email') }}</x-label>
                    <x-input type="email" name="email" id="email" value="{{ old('email') }}"/>
                    @error('email')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="password">{{ trans('auth.password') }}</x-label>
                    <x-input type="password" name="password" id="password" value="{{ old('password') }}"/>
                    @error('password')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="confirm_password">{{ trans('auth.confirm_password') }}</x-label>
                    <x-input type="password" name="confirm_password" id="confirm_password"/>
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="phone">{{ trans('users.phone') }}</x-label>
                    <x-input type="text" name="phone" id="phone" value="{{ old('phone') }}" />
                    @error('phone')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="address">{{ trans('users.address') }}</x-label>
                    <x-input type="text" name="address" id="address" value="{{ old('address') }}"/>
                    @error('address')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="birthday">{{ trans('users.birthday') }}</x-label>
                    <x-input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" />
                    @error('birthday')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="city">{{ trans('users.city') }}</x-label>
                    <x-input type="text" name="city" id="city" value="{{ old('city') }}"/>
                    @error('city')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

                <div class="flex flex-grow flex-col">
                    <x-label for="country">{{ trans('users.country') }}</x-label>
                    <x-input type="text" name="country" id="country" value="{{ old('country') }}"/>
                    @error('country')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>

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
            <div class="flex items-center justify-start mt-6 gap-3">
                <x-button-link href="{{ route('admin.users.index') }}">
                    {{ trans('buttons.back') }}
                </x-button-link>
                <x-button>{{ trans('buttons.save') }}</x-button>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>

