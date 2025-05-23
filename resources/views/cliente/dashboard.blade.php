@extends('layouts.cliente')

@section('content')
<div class="container mx-auto p-6 space-y-6">
    <!-- Encabezado -->
    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white text-center">
        ¡Bienvenid@! {{ Auth::user()->name }}
    </h1>
    <p class="text-lg text-gray-700 dark:text-gray-300 text-center">
        Este es tu panel de cliente donde puedes acceder a tus documentos importantes y ver tus archivos subidos.
    </p>

    <!-- Tarjeta con número de documentos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col justify-center items-center">
            <div class="text-6xl font-bold text-blue-600 dark:text-blue-400">
                {{ $documentosCount ?? 0 }}
            </div>
            <div class="mt-2 text-gray-700 dark:text-gray-300 text-center text-lg">
                Documentos Disponibles
            </div>
        </div>
    </div>

    <!-- Botón -->
    <div class="flex justify-center">
        <a href="{{ route('cliente.documentos') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition">
            Ver mis documentos
        </a>
    </div>

    <!-- Agregar más secciones aquí si es necesario -->
</div>
@endsection