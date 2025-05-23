@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl px-4 py-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800">Subir PDF a Clientes</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-5 py-3 rounded-md mb-6 border border-green-300 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        @foreach($clientes as $cliente)
            <div class="p-5 border border-gray-200 rounded-md shadow-sm hover:shadow-md transition-shadow duration-300">
                <h3 class="text-xl font-medium text-gray-900 mb-3">{{ $cliente->nombre }} 
                    <span class="text-gray-500 text-sm">({{ $cliente->email }})</span>
                </h3>

                <form action="{{ route('upload.pdf', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="pdf" class="mb-4 px-3 py-2 border border-gray-300 rounded-md w-full" required>

<div class="bg-white p-4">
  <button type="submit" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded border border-yellow-700 hover:bg-yellow-600 hover:border-yellow-800 transition duration-300">
    Subir PDF
  </button>
</div>



                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection