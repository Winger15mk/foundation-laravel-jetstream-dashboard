<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $header }} - {{ config('app.name', 'Laravel') }}</title>
    {{-- fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet"
    >
    {{-- dark mode initial handler --}}
    <script>
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    {{-- vite scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- styles --}}
    @livewireStyles
</head>
<body class="h-full bg-gray-100 dark-bg-secondary">
<div
    x-data="{ mobileMenuOpen: false }"
>
    {{-- mobile sidebar --}}
    <x-navigation.side.mobile_sidebar/>
    {{-- desktop sidebar --}}
    <x-navigation.side.desktop_sidebar/>
    {{-- main right content area --}}
    <div class="md:pl-64 flex flex-col flex-1">
        <x-navigation.top.top_bar/>
        <main>
            <div class="py-6">
                <div class="mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-bold text-gray-900 dark-text">{{ $header }}</h1>
                </div>
                <div class="mx-auto px-4 sm:px-6 md:px-8">
                    <div class="py-4">
                        <!-- general slot content --->
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@stack('modals')
@livewireScripts
</body>
</html>
