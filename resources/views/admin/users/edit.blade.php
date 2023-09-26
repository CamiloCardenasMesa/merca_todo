<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-oswald text-4xl text-gray-800 leading-tight">
            {{ trans('users.user') . $user->name }}
        </h2>
    </x-slot>
    <x-article-layout>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1">
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

                <div class="flex items-center justify-center mt-9 gap-3">
                    <x-button-link href="{{ route('admin.users.index') }}">
                        {{ trans('buttons.back') }}
                    </x-button-link>
                    <x-button>{{ trans('buttons.save') }}</x-button>
                </div>
            </div>
        </form>
    </x-article-layout>
</x-app-layout>
