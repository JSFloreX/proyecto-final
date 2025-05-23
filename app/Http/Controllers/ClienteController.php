<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Archivo;
class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }


    public function create()
    {
         return view('cliente.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'cedula' => 'required|string|unique:clientes,cedula',
            'voucher' => 'required|string|min:6',
        ]);

  
        Cliente::create([
            'cedula' => $validated['cedula'],
            'voucher' => Hash::make($validated['voucher']),
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

   
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

 
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'cedula' => 'required|string|unique:clientes,cedula,' . $cliente->id,
            'voucher' => 'nullable|string|min:6',
        ]);

        $cliente->cedula = $validated['cedula'];
        if (!empty($validated['voucher'])) {
            $cliente->voucher = Hash::make($validated['voucher']);
        }
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

   
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }

    
    public function panel()
    {
        $cliente = auth()->user();  
        $archivos = $cliente->archivos; 

        return view('cliente.index', compact('cliente', 'archivos'));
    }
public function dashboard()
{
    $cliente = auth()->user(); 
    $documentosCount = Archivo::where('cliente_id', $cliente->id)->count(); 

    return view('cliente.dashboard', compact('documentosCount'));
}


    

    public function documentos()
    {
        $cliente = auth()->user();
        $archivos = $cliente->archivos()->get();

     return view('cliente.documentos', compact('cliente', 'archivos'));

    }
}