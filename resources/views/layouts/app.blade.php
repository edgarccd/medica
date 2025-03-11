<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hospital</title>       

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="background-color: aqua;" >
        <div style="background-color:azure">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header >
                    <div >
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main style="background-color: aqua;">
                {{ $slot }}
            </main>
        </div>
        
    </body>
</html>
