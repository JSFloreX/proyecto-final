@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Bienvenido, {{ $cliente->cedula }}</h1>

    <h2 class="text-xl font-semibold mb-2">Tus Archivos:</h2>

    @if($archivos->count())
        <ul class="space-y-2">
            @foreach($archivos as $archivo)
                <li class="p-3 bg-gray-100 rounded hover:bg-gray-200">
                    <a href="{{ asset('storage/' . $archivo->ruta) }}" target="_blank" class="text-blue-600 hover:underline">
                        {{ $archivo->nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No tienes archivos disponibles.</p>
    @endif
</div>
@endsection
