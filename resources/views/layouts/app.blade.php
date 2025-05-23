<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts and Styles compiled by Vite -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
  <div class="flex flex-col min-h-screen">

    <!-- Navbar fija arriba -->
    <header class="fixed top-0 left-0 right-0 h-14 bg-white dark:bg-gray-800 shadow z-30 flex items-center px-6">
      <div class="p-6 border-b border-gray-200 dark:border-gray-700">
 <img src="{{ asset('imagenes/logo2.jpg') }}" alt="Agencia Admin" class="w-40 mx-auto" />


</div>
      <!-- Aquí puedes poner más elementos en la navbar -->
    </header>

    <div class="flex flex-1 pt-14">

      <!-- Sidebar fija a la izquierda -->
      <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg hidden sm:flex flex-col fixed top-14 bottom-0 left-0 z-20">
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

      <!-- Contenido principal: deja espacio para sidebar -->
      <main class="flex-1 ml-64 p-8 overflow-auto bg-gray-100 dark:bg-gray-900">
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>
