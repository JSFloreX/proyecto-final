@extends('layouts.cliente')

@section('content')
<div class="container mx-auto p-6 space-y-10 lg:ml-[-9rem]">

   
    <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white text-center">
        ¡Bienvenid@! {{ Auth::user()->name }}
    </h1>

 
    <div class="overflow-x-auto">
        <div class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-6xl font-bold text-blue-600 dark:text-blue-400">
                {{ $documentosCount ?? 0 }}
            </div>
            <div class="mt-2 text-gray-700 dark:text-gray-300 text-center text-lg">
                Documentos Disponibles
            </div>
        </div>
    </div>


    <div class="flex justify-center">
        <a href="{{ route('cliente.documentos') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition">
            Ver mis documentos
        </a>
    </div>

</div>
@endsection
