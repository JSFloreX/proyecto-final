<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <title>Iniciar Sesión</title>
  <style>
    #toast {
      position: fixed;
      bottom: 1.5rem;
      right: 1.5rem;
      background-color: #f87171;
      color: white;
      padding: 1rem 1.5rem;
      border-radius: 0.5rem;
      font-weight: 600;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      display: none;
      white-space: pre-line;
      z-index: 9999;
    }
  </style>
  <script>
    function showForm(tipo) {
      const tabAdmin = document.getElementById('tab-admin');
      const tabCliente = document.getElementById('tab-cliente');
      const formAdmin = document.getElementById('form-admin');
      const formCliente = document.getElementById('form-cliente');

      if (tipo === 'admin') {
        tabAdmin.classList.add('bg-yellow-500', 'text-white', 'shadow-md', 'border-b-4', 'border-yellow-700');
        tabAdmin.classList.remove('text-yellow-900');
        tabCliente.classList.remove('bg-yellow-500', 'text-white', 'shadow-md', 'border-b-4', 'border-yellow-700');
        tabCliente.classList.add('text-yellow-900');
        formAdmin.classList.remove('hidden');
        formCliente.classList.add('hidden');
      } else {
        tabCliente.classList.add('bg-yellow-500', 'text-white', 'shadow-md', 'border-b-4', 'border-yellow-700');
        tabCliente.classList.remove('text-yellow-900');
        tabAdmin.classList.remove('bg-yellow-500', 'text-white', 'shadow-md', 'border-b-4', 'border-yellow-700');
        tabAdmin.classList.add('text-yellow-900');
        formCliente.classList.remove('hidden');
        formAdmin.classList.add('hidden');
      }
    }

    window.addEventListener('DOMContentLoaded', function() {
      showForm('cliente');
    });
  </script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-900">

  <div class="bg-yellow-500 w-80 p-6 rounded-lg shadow-lg">
  <img src="{{ asset('imagenes/logo.png') }}" alt="Logo" class="w-full h-auto mb-4 ml-4" />


    @if(session('error'))
      <div class="bg-red-600 text-white text-sm font-semibold rounded px-3 py-2 mb-4">
        {{ session('error') }}
      </div>
    @endif


    <div class="flex mb-6 bg-white rounded-full overflow-hidden">
      <button
        id="tab-admin"
        onclick="showForm('admin')"
        class="flex-1 py-2 text-center font-semibold transition-all duration-200 ease-in-out text-yellow-900 border-b-4 border-transparent"
      >
        Administrador
      </button>
      <button
        id="tab-cliente"
        onclick="showForm('cliente')"
        class="flex-1 py-2 text-center font-semibold transition-all duration-200 ease-in-out text-yellow-900 border-b-4 border-transparent"
      >
        Cliente
      </button>
    </div>


    <form
      id="form-admin"
      method="POST"
      action="{{ route('login') }}"
      autocomplete="off"
      class="hidden"
    >
      @csrf
      <input type="text" name="fakeusernameremembered" style="display:none" />
      <input type="password" name="fakepasswordremembered" style="display:none" />

      <div class="mb-4">
        <label for="usuario_admin" class="block text-yellow-900 font-semibold">Correo electrónico</label>
        <input
          type="email"
          name="usuario"
          id="usuario_admin"
          value="{{ old('usuario') }}"
          autocomplete="username"
          class="mt-1 p-2 w-full rounded border border-gray-300 focus:ring focus:ring-blue-300"
          required
        />
        @error('usuario')
          <div class="text-red-100 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password_admin" class="block text-yellow-900 font-semibold">Contraseña</label>
        <input
          type="password"
          name="password"
          id="password_admin"
          autocomplete="current-password"
          class="mt-1 p-2 w-full rounded border border-gray-300 focus:ring focus:ring-blue-300"
          required
        />
        @error('password')
          <div class="text-red-100 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <input type="hidden" name="tipo_usuario" value="admin" />

      <button
        type="submit"
        class="w-full bg-white text-yellow-600 font-bold p-2 rounded hover:bg-gray-100 transition duration-200"
      >
        INICIAR SESIÓN ADMIN
      </button>
    </form>


    <form
      id="form-cliente"
      method="POST"
      action="{{ route('login') }}"
      autocomplete="off"
      class="hidden"
    >
      @csrf
      <input type="text" name="fakeusernameremembered" style="display:none" />
      <input type="password" name="fakepasswordremembered" style="display:none" />

      <div class="mb-4">
        <label for="usuario_cliente" class="block text-yellow-900 font-semibold">Cédula</label>
        <input
          type="text"
          name="usuario"
          id="usuario_cliente"
          value="{{ old('usuario') }}"
          autocomplete="new-username"
          class="mt-1 p-2 w-full rounded border border-gray-300 focus:ring focus:ring-blue-300"
          required
        />
        @error('usuario')
          <div class="text-red-100 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password_cliente" class="block text-yellow-900 font-semibold">Código Voucher</label>
        <input
          type="password"
          name="password"
          id="password_cliente"
          autocomplete="new-password"
          class="mt-1 p-2 w-full rounded border border-gray-300 focus:ring focus:ring-blue-300"
          required
        />
        @error('password')
          <div class="text-red-100 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>

      <input type="hidden" name="tipo_usuario" value="cliente" />

      <button
        type="submit"
        class="w-full bg-white text-yellow-600 font-bold p-2 rounded hover:bg-gray-100 transition duration-200"
      >
        INICIAR SESIÓN CLIENTE
      </button>
    </form>
  </div>


  <div id="toast"></div>
</body>
</html>
