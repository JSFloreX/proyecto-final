<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login'); // login admin por defecto
});

// Login y logout admin / usuario principal
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// RUTAS ADMIN (guard: web por defecto)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Clientes - CRUD completo
    Route::resource('clientes', ClienteController::class);

    // Archivos - cargar PDFs
    Route::get('/archivos', [ArchivoController::class, 'index'])->name('archivos.index');
    Route::post('/archivos', [ArchivoController::class, 'store'])->name('archivos.store');

    // Opcional - vistas o funciones extra en AdminController
    Route::get('/admin/clientes/archivos', [AdminController::class, 'verClientesConCarga'])->name('admin.clientes.archivos');
    Route::post('/admin/clientes/{cliente}/archivos', [AdminController::class, 'subirArchivo'])->name('admin.clientes.archivos.subir');
});

// RUTAS LOGIN CLIENTE - manejo de autenticación separado con guard cliente
Route::get('/cliente/login', [ClienteAuthController::class, 'showLoginForm'])->name('cliente.login');
Route::post('/cliente/login', [ClienteAuthController::class, 'login'])->name('cliente.login.submit');
Route::post('/cliente/logout', [ClienteAuthController::class, 'logout'])->name('cliente.logout');

Route::middleware(['auth:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');
    Route::get('/cliente/documentos', [ClienteController::class, 'documentos'])->name('cliente.documentos');
});
