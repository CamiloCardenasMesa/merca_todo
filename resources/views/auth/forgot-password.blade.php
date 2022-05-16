<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('images/login_logo_mercatodo.png') }}" alt="MercaTodo logo" width="400">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __(trans('auth.reset_password')) }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__(trans('auth.email'))" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __(trans('auth.email_password_reset_link')) }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
