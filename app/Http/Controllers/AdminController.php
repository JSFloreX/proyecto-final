<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     public function index()
    {
         $totalClientes = Cliente::count();

              return view('admin.dashboard', compact('totalClientes'));
              
    }
    public function verClientesConCarga()
    {
        $clientes = Cliente::all();
        return view('admin.subir_archivos', compact('clientes'));
    }

    public function subirArchivo(Request $request, Cliente $cliente)
    {
        $request->validate([
            'archivo_pdf' => 'required|mimes:pdf|max:20480', 
        ]);

        $archivoSubido = $request->file('archivo_pdf');
        $nombreOriginal = $archivoSubido->getClientOriginalName();
        $ruta = $archivoSubido->store('archivos_pdf', 'public');

        Archivo::create([
            'cliente_id' => $cliente->id,
            'nombre_archivo' => $nombreOriginal,
            'ruta' => $ruta,
        ]);

        return redirect()->route('admin.clientes.archivos')->with('success', 'Archivo subido correctamente para ' . $cliente->nombre);
    }
}
