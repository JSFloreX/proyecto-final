<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    
      .transition-transform {
        transition: transform 0.3s ease-in-out;
      }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="flex min-h-screen">

   
        <button
          id="menu-toggle"
          aria-label="Abrir menú"
          class="sm:hidden fixed top-4 left-4 z-50 bg-white dark:bg-gray-800 p-2 rounded-md shadow-md text-gray-700 dark:text-gray-300 focus:outline-none focus:ring"
          >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>

        <aside
          id="sidebar"
          class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-lg transform -translate-x-full sm:translate-x-0 sm:static sm:inset-auto sm:flex sm:flex-col transition-transform z-40"
        >
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <img src="{{ asset('imagenes/logo2.jpg') }}" alt="Agencia Admin" class="w-40 mx-auto" />
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 text-center break-words">{{ Auth::user()->name }}</p>
            </div>

            <nav class="flex-1 flex flex-col mt-6">
                <a href="{{ route('cliente.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
                    Inicio
                </a>
                <a href="{{ route('cliente.documentos') }}" class="flex items-center px-6 py-3 mt-1 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
                    Ver Documentos
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-auto px-6 py-3">
                    @csrf
                    <button type="submit" class="w-full text-left text-red-600 hover:text-red-800 font-semibold focus:outline-none">
                        Cerrar Sesión
                    </button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 p-8 overflow-auto sm:ml-64">
            @yield('content')
        </main>
    </div>

    <script>
      const btn = document.getElementById('menu-toggle');
      const sidebar = document.getElementById('sidebar');

      btn.addEventListener('click', () => {
        if (sidebar.classList.contains('-translate-x-full')) {
          sidebar.classList.remove('-translate-x-full');
          sidebar.classList.add('translate-x-0');
        } else {
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('translate-x-0');
        }
      });

      
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 640) { 
          sidebar.classList.remove('-translate-x-full');
          sidebar.classList.add('translate-x-0');
        } else {
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('translate-x-0');
        }
      });
    </script>
</body>
</html>
