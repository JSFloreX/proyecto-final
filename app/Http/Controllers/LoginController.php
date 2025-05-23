<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

 
        $user = User::where('email', $credentials['usuario'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::guard('web')->login($user);
            return redirect()->intended('/dashboard');
        }

         $cliente = Cliente::where('cedula', $credentials['usuario'])->first();
    if ($cliente && Hash::check($credentials['password'], $cliente->voucher)) {
        Auth::guard('cliente')->login($cliente);
        return redirect()->intended('/cliente');
    }
 
        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('cliente')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
