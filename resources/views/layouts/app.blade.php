<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Currículo Grupo Ello RH') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles
        <link rel="icon" href="/img/flaticon-180x180.png" />
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>    
        <link rel="stylesheet" type="text/css" href="/theme/assets/css/forms/switches.css">
        

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>

        @stack('modals')

        @livewireScripts
        <script src="//code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="//cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js" type="text/javascript"></script>
        <script src="//cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js" type="text/javascript"></script>

       @yield('scripts')
    </body>
</html>
