<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;


class LoginClienteController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        
        $cliente = Cliente::where('cedula', $request->usuario)->first();

        if (!$cliente || !Hash::check($request->password, $cliente->voucher)) {
            return response()->json(['message' => 'Credenciales incorrectas.'], 401);
        }

        Auth::guard('cliente')->login($cliente);

        $request->session()->regenerate();

        return response()->json(['success' => true, 'redirect' => route('cliente.panel')]);
    }

    public function logout(Request $request)
    {
        Auth::guard('cliente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
