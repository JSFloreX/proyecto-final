@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">

        <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-white">Crear Nuevo Cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0 list-disc pl-5 text-sm text-red-600 dark:text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="cedula" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Cédula (Usuario)</label>
                <input 
                    type="text" 
                    id="cedula" 
                    name="cedula" 
                    value="{{ old('cedula') }}" 
                    class="form-control block w-full max-w-xs px-4 py-2 border border-gray-300 rounded-md shadow-sm 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 
                        dark:border-gray-600 dark:text-white mx-auto" 
                    placeholder="Ej: 1234567890" 
                    required
                >
            </div>

            <div>
                <label for="voucher" class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Código Voucher (Contraseña)</label>
                <input 
                    type="password" 
                    id="voucher" 
                    name="voucher" 
                    value="{{ old('voucher') }}" 
                    class="form-control block w-full max-w-xs px-4 py-2 border border-gray-300 rounded-md shadow-sm 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 
                        dark:border-gray-600 dark:text-white mx-auto" 
                    placeholder="Mínimo 6 caracteres" 
                    minlength="6"
                    required
                >
            </div>

            <div class="flex justify-center mt-6">
              <button type="submit" style="display:block; width:200px; margin:20px auto; padding:10px 20px; background-color:#2563eb; color:white; font-weight:bold; border-radius:6px; border:none; cursor:pointer;">
    Crear Cliente
</button>


            </div>
        </form>
    </div>
</div>
@endsection
