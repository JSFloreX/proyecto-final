<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="flex min-h-screen">

        <!-- Sidebar admin fijo -->
        <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg hidden sm:flex flex-col">
            <<div class="p-6 border-b border-gray-200 dark:border-gray-700">
              

            <nav class="flex-1 flex flex-col mt-6">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
                    Dashboard
                </a>
                <a href="{{ route('clientes.index') }}" class="flex items-center px-6 py-3 mt-1 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
                    Gestionar Clientes
                </a>
                <a href="{{ route('archivos.index') }}" class="flex items-center px-6 py-3 mt-1 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
                    Archivos PDF
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto px-6 py-3">
                    @csrf
                    <button type="submit" class="w-full text-left text-red-600 hover:text-red-800 font-semibold focus:outline-none">
                        Cerrar Sesión
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Contenido principal que cambia -->
        <main class="flex-1 p-8 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
