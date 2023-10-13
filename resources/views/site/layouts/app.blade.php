<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

{{--        <title>Laravel</title>--}}

        @yield('meta')
        <!-- Fonts -->

        <!-- Styles -->
        @vite('resources/css/app.css')

        <!-- Scripts -->
        @vite('resources/js/app.js')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </head>
    <body>
        <header class="h-screen w-screen">
            <x-navigation />
            @yield('slider')
        </header>

        @yield('content')

    </body>
</html>
