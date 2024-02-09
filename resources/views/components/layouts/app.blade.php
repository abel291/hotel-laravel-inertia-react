<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @livewireStyles
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
</head>

<body class="font-sans antialiased text-neutral-800 relative">
    <x-toast />
    <div>
        <div class="hidden md:flex fixed top-0 bottom-0">
            <x-layouts.sidebar />
        </div>

        <div class="md:ml-72">
            <div class="min-h-screen bg-neutral-50">
                <x-layouts.navigation />

                <!-- Page Heading -->
                @if (isset($header))
                    <header>
                        <div class="max-w-7xl mx-auto pt-12 px-4 md:px-6 lg:px-8">
                            {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight"> --}}
                            {{ $header }}
                            {{-- </h2> --}}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-6">
                        <x-notification />
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>