<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Tobenski App' }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Scheherazade:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @stack('styles')
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src="https://kit.fontawesome.com/c4b1104435.js" crossorigin="anonymous"></script>

        @stack('headerscripts')
    </head>
    <body class="font-sans antialiased flex flex-col overflow-x-hidden w-screen text-siteText bg-siteBg">
        <div class="min-h-screen bg-gray-100">
            @livewire('admin.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-black leading-tight">
                        {{ $header ?? 'gnu'}}
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>
        @stack('modals')
        @stack('bottomscripts')
        @livewireScripts
    </body>
</html>
