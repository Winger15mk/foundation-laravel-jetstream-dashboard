<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- fonts --}}
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
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
</head>
<body class="h-full">
<div class="bg-white dark-bg min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
    <div class="max-w-max mx-auto">
        <main class="sm:flex">
            <p class="text-4xl tracking-tight font-bold text-blue-600 sm:text-5xl mb-5 sm:mb-0">
                <svg class="animate-spin-slow sm:-ml-1 sm:mr-3 h-16 w-16 text-blue mx-auto"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </p>
            <div class="sm:ml-6">
                <div class="sm:border-l sm:border-gray-200 dark-border sm:pl-6 text-center">
                    <h1 class="text-4xl font-bold text-gray-900 tracking-tight sm:text-5xl sm:tracking-tight dark-text">
                        Maintenance In Progress</h1>
                    <p class="mt-1 text-base text-gray-500 dark-text-secondary">
                        We are currently making updates and will be back online soon
                    </p>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
