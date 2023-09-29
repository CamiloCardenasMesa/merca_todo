<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <x-article-layout>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-gray-100 p-6 rounded-lg shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <div class="flex flex-grow flex-col">
                        <x-label for="name">{{ trans('auth.name') }}</x-label>
                        <x-input type="text" name="name" value="{{ $user->name }}"/>
                    </div>
                    
                    <div class="flex flex-grow flex-col">
                        <x-label for="email">{{ trans('auth.email') }}</x-label>
                        <x-input type="email" name="email" value="{{ $user->email }}"/>
                    </div>
                    
                    <div class="flex flex-grow flex-col">
                        <x-label for="password">{{ trans('auth.password') }}</x-label>
                        <x-input type="password" name="password"/>
                    </div>
                    
                    <div class="flex flex-grow flex-col">
                        <x-label for="confirm-password">{{ trans('auth.confirm_password') }}</x-label>
                        <x-input type="password" name="confirm-password"/>
                    </div>

                    <div class="flex flex-grow flex-col">
                        <x-label for="phone">{{ trans('users.phone') }}</x-label>
                        <x-input type="text" name="phone" value="{{ $user->phone }}"/>
                    </div>

                    <div class="flex flex-grow flex-col">
                        <x-label for="address">{{ trans('users.address') }}</x-label>
                        <x-input type="text" name="address" value="{{ $user->address }}"/>
                    </div>
                    
                    <div class="flex flex-grow flex-col">
                        <x-label for="birthday">{{ trans('users.birthday') }}</x-label>
                        <x-input type="date" name="birthday" value="{{ $user->birthday }}"/>
                    </div>
                    
                    <div class="flex flex-grow flex-col">
                        <x-label for="city">{{ trans('users.city') }}</x-label>
                        <x-input type="text" name="city" value="{{ $user->city }}"/>
                    </div>
                    
                    <div class="flex flex-grow flex-col">
                        <x-label for="country">{{ trans('users.country') }}</x-label>
                        <x-input type="text" name="country" value="{{ $user->country }}"/>
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
                </div>
            </div>
            <div class="flex items-center justify-start mt-6 gap-3">
                <x-button-link href="{{ route('admin.users.index') }}">
                    {{ trans('buttons.back') }}
                </x-button-link>
                <x-button>{{ trans('buttons.save') }}</x-button>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>
