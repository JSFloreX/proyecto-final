@extends('layouts.cliente')

@section('content')
<div class="p-6">
    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">Mis Documentos</h1>

    @if($archivos->isEmpty())
        <div class="flex items-start justify-start">
            <p class="text-xl text-gray-600 dark:text-gray-400">No tienes documentos cargados.</p>
        </div>
    @else
        <div class="w-full overflow-x-auto">
    <div class="inline-block min-w-[600px] align-left">
        <table class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-600">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <th class="py-3 px-4 border-b w-1/4 text-left">Tipo</th>
                    <th class="py-3 px-4 border-b w-1/2 text-left">Archivo</th>
                    <th class="py-3 px-4 border-b w-1/4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archivos as $archivo)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 border-b">
                        <td class="py-2 px-4 text-gray-900 dark:text-white">{{ $archivo->tipo ?? 'Documento' }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ asset('storage/' . $archivo->filename) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 transition duration-300">Ver PDF</a>
                        </td>
                        <td class="py-2 px-4">
                            <a href="{{ asset('storage/' . $archivo->filename) }}" target="_blank" class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-1 px-4 rounded-md transition duration-300">Descargar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    @endif

    <div class="mt-10 ml-4">
        <a href="{{ route('cliente.dashboard') }}" 
           class="bg-gray-700 hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-md transition duration-300 shadow-md">
            Volver al panel
        </a>
    </div>
</div>
@endsection

