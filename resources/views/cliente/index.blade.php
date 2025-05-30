@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto bg-white dark:bg-gray-900 rounded-xl shadow-lg border border-gray-300 dark:border-gray-700 space-y-8">

    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white text-center animate-fadeInDown">
        Listado de Clientes
    </h1>

    @if(session('success'))
        <div class="px-6 py-4 rounded-md bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 border border-green-400 dark:border-green-500 animate-fadeInUp shadow-sm flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 dark:text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($clientes->count())
        <div class="overflow-x-auto rounded-md shadow border border-gray-300 dark:border-gray-700 animate-fadeInUp">
            <table class="min-w-full text-sm text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 uppercase tracking-wide text-xs">
                    <tr>
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Cédula (Usuario)</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($clientes as $index => $cliente)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        <td class="py-3 px-6 font-medium">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 font-mono">{{ $cliente->cedula }}</td>
                        <td class="py-3 px-6 flex gap-3 flex-wrap">
                            
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="custom-btn border border-red-600 text-red-600 dark:text-red-400 dark:border-red-400 hover:bg-red-600 hover:text-white">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600 dark:text-gray-300 text-center mt-12 animate-fadeInUp">
            No hay clientes registrados.
        </p>
    @endif
</div>

<style>
@keyframes fadeInDown {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}
.animate-fadeInDown {
    animation: fadeInDown 0.5s ease forwards;
}
.animate-fadeInUp {
    animation: fadeInUp 0.5s ease forwards;
}


.custom-btn {
    @apply font-bold py-2 px-4 rounded-md transition-all duration-300 ease-in-out;
}
</style>
@endsection
