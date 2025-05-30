<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
  <div class="flex flex-col min-h-screen">

    
    <header class="fixed top-0 left-0 right-0 h-14 bg-white dark:bg-gray-800 shadow z-30 flex items-center justify-between px-4 sm:px-6">
      <button id="menu-toggle" class="sm:hidden text-gray-700 dark:text-gray-300 focus:outline-none" aria-label="Abrir menú">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>


      <div class="mx-auto sm:mx-0">
        <img src="{{ asset('imagenes/logo2.jpg') }}" alt="Agencia Admin" class="w-40" />
      </div>
    </header>

    <div class="flex flex-1 pt-14">

  
      <aside
        id="sidebar"
        class="w-64 bg-white dark:bg-gray-800 shadow-lg flex-col fixed top-14 bottom-0 left-0 z-20 transform -translate-x-full sm:translate-x-0 transition-transform duration-300 sm:flex"
      >
        <nav class="flex-1 flex flex-col mt-6 px-6">
          <a href="{{ route('dashboard') }}" class="flex items-center py-3 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
            Inicio
          </a>
          <a href="{{ route('clientes.index') }}" class="flex items-center py-3 mt-1 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
            Gestionar Clientes
          </a>
          <a href="{{ route('archivos.index') }}" class="flex items-center py-3 mt-1 text-gray-700 dark:text-gray-300 hover:bg-blue-100 dark:hover:bg-blue-700 transition rounded-md font-semibold">
            Archivos PDF
          </a>
          <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="w-full text-left text-red-600 hover:text-red-800 font-semibold focus:outline-none py-3">
              Cerrar Sesión
            </button>
          </form>
        </nav>
      </aside>

      
      <main class="flex-1 p-6 overflow-auto ml-0 sm:ml-64 transition-all duration-300">
        @yield('content')
      </main>
    </div>
  </div>


  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });
  </script>
</body>
</html>
