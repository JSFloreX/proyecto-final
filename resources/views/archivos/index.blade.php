@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Subir Archivos PDF</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data" class="mb-8 bg-white dark:bg-gray-800 p-6 rounded shadow-md">
        @csrf

        <label for="cliente_id" class="block mb-2 font-semibold text-gray-900 dark:text-white">Selecciona Cliente</label>
        <select name="cliente_id" id="cliente_id" class="custom-select mb-4 w-full rounded border border-gray-300 p-2">
            <option value="">-- Selecciona un cliente --</option>
            @foreach(App\Models\Cliente::all() as $cliente)
                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->cedula }}
                </option>
            @endforeach
        </select>

        <label for="pdf_file" class="block mb-2 font-semibold text-gray-900 dark:text-white">Selecciona archivo PDF</label>
        <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" class="custom-input mb-4 w-full rounded border border-gray-300 p-2">

        <button type="submit" class="custom-btn">Subir PDF</button>
    </form>

    <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white">Archivos Subidos</h2>
    <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow-md">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Cliente</th>
                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Archivo PDF</th>
                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Fecha de Subida</th>
                <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivos as $archivo)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">{{ $archivo->cliente->cedula }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">
                        <a href="{{ asset('storage/' . $archivo->filename) }}" target="_blank" class="text-blue-600 hover:underline">Ver PDF</a>
                    </td>
                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">{{ $archivo->created_at->format('d/m/Y H:i') }}</td>
                    <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-600">
                        <!-- Aquí puedes agregar botones para eliminar o descargar si quieres -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
