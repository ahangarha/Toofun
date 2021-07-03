<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Site Title') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v27.2.2/dist/font-face.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="bg-gray-50" dir="auto">

    @if (Route::currentRouteName() !== 'homepage')
        <header class="absolute top-4 end-4 z-40 text-white md:opacity-30 md:hover:opacity-80 transition">
            <a href="{{ route('homepage', app()->getLocale()) }}" class="block p-2 border-2 rounded-lg">
                <svg class="w-8 h-8 block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
            </a>
        </header>
    @endif

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    <div class="bg-purple-800 text-white text-center text-sm py-8 px-4 my-16 flex flex-col items-center">
        @if (config('app.all_locales'))
            <ul class="flex mb-8">
                @foreach (config('app.all_locales') as $locale)
                    <li class="">
                        <a class="flex justify-center items-center w-8 h-8 hover:bg-purple-700 {{ app()->getLocale() === $locale ? 'bg-purple-900' : '' }}"
                            href="{{ route('homepage', $locale) }}">{{ $locale }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        {{ __('License Notice') }}

        <a href="https://framagit.org/ahangarha/toofun" target="_blank" rel="noopener noreferrer"
            class="text-pink-400 underline">{{ __('Code Repository') }}</a>
    </div>

    @livewireScripts
</body>

</html>
