<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            

            <script>
        document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme") || "light";
            const savedLayout = localStorage.getItem("layout") || "default";

            document.documentElement.setAttribute("data-theme", savedTheme);
            document.documentElement.setAttribute("data-layout", savedLayout);
        });

        function setTheme(theme) {
            document.documentElement.setAttribute("data-theme", theme);
            localStorage.setItem("theme", theme);
        }

        function setLayout(layout) {
            document.documentElement.setAttribute("data-layout", layout);
            localStorage.setItem("layout", layout);
        }

        function closeCustomizer() {
            document.querySelector('.theme-customizer').style.display = 'none';
        }
    </script>

        </div>
    </body>
</html>
