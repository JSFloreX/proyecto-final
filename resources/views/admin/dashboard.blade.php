@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
  <main class="flex-1 container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-8 text-center sm:text-left">
      Bienvenido, {{ Auth::user()->name }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
  
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-400 via-pink-500 to-red-500"></div>
          <h2 class="ml-4 text-lg font-semibold text-gray-900 dark:text-white">Clientes</h2>
        </div>
        <p class="text-4xl font-bold text-gray-900 dark:text-white">{{ $totalClientes }}</p>
        <p class="text-gray-600 dark:text-gray-400">Registrados en el sistema</p>
      </div>

      
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 rounded-full bg-green-400 flex items-center justify-center text-white text-lg font-bold">PDF</div>
          <h2 class="ml-4 text-lg font-semibold text-gray-900 dark:text-white">Archivos Subidos</h2>
        </div>
        <p class="text-4xl font-bold text-gray-900 dark:text-white">{{ $totalFiles ?? 0 }}</p>
        <p class="text-gray-600 dark:text-gray-400">Documentos PDF almacenados</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 rounded-full border-4 border-purple-500 flex items-center justify-center text-purple-600 font-bold">
            ?
          </div>
          <h2 class="ml-4 text-lg font-semibold text-gray-900 dark:text-white">Otros</h2>
        </div>
        <p class="text-4xl font-bold text-gray-900 dark:text-white">Próximamente</p>
        <p class="text-gray-600 dark:text-gray-400">Módulos adicionales</p>
      </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transition-shadow hover:shadow-xl">
      <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Acciones rápidas</h3>
      <div class="mt-6 flex flex-col sm:flex-row gap-4 sm:gap-6">
        <a href="{{ route('clientes.create') }}" class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md text-center transition">
          Crear Cliente
        </a>
        <a href="{{ route('archivos.index') }}" class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md text-center transition">
          Subir Archivos PDF
        </a>
      </div>
    </div>

  </main>
</div>
@endsection
