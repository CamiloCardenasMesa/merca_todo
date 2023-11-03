<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    {{-- header --}}
    @include('layouts.header')
    <div class="flex">
        {{-- navigation bar --}}
        @include('layouts.aside')

        {{-- main --}}
        <div class="bg-[#EBEBF1] py-9 px-6 pb-6 w-full overflow-auto">
            <main class="sm:px-6 lg:px-8 bg-mi-color">
                <header class="max-w-7xl sm:pt-0 pb-4 mx-auto sm:px-6 lg:px-8">
                    <h2 class="font-semibold font-oswald text-4xl text-dark-blue leading-tight">
                        {{ $header }}
                    </h2>
                </header>
                {{ $slot }}
            </main>
        </div>
    </div>
    <x-footer />
</body>
<script src="{{ asset('js/main.js') }}"></script>
</html>