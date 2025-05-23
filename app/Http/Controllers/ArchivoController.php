<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
  
    public function index()
    {
        $archivos = Archivo::all();
        return view('archivos.index', compact('archivos'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'pdf_file' => 'required|file|mimes:pdf|max:2048',
        ]);

     
        $path = $request->file('pdf_file')->store('pdf', 'public');

        Archivo::create([
            'cliente_id' => $request->cliente_id,
            'filename' => $path,
        ]);

        return redirect()->route('archivos.index')->with('success', 'Archivo PDF subido correctamente.');
    }
}
