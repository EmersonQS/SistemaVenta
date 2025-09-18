<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AfectacionTipoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DocumentoTipoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ComprobanteTipoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ComprobanteSerieController;

use App\Exports\VentasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('autenticacion.login');
    });

    Route::get('login', function () {
        return view('autenticacion.login');
    })->name('login');

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/afectacion-tipos/select', [AfectacionTipoController::class, 'select'])->name('afectacion-tipos.select');
    Route::resource('/afectacion-tipos', AfectacionTipoController::class)->except(['create', 'edit']);
    Route::get('/unidades/select', [UnidadController::class, 'select'])->name('unidades.select');
    Route::get('/permisos/select', [RoleController::class, 'permisos'])->name('permisos.select');
    Route::get('/roles/select', [RoleController::class, 'roles'])->name('roles.select');
    Route::get('/documento-tipos/select', [DocumentoTipoController::class, 'select'])->name('documento-tipos.select');
    Route::resource('/documento-tipos', DocumentoTipoController::class)->except(['create', 'edit']);
    Route::get('/comprobante-tipos/select', [ComprobanteTipoController::class, 'select'])->name('comprobante-tipos.select');
    Route::resource('/comprobante-tipos', ComprobanteTipoController::class)->except(['create', 'edit']);
    Route::resource('/comprobante-series', ComprobanteSerieController::class)->except(['create', 'edit']);
    Route::get('/productos/buscar', [ProductoController::class, 'buscar'])->name('productos.buscar');


    Route::resource('unidades', UnidadController::class)->except(['create', 'edit']);
    Route::resource('productos', ProductoController::class)->except(['create', 'edit']);
    Route::resource('roles', RoleController::class)->except(['create', 'edit']);
    Route::resource('usuarios', UserController::class)->except(['create', 'edit']);

    Route::get('/clientes/buscar', [ClienteController::class, 'buscar'])->name('clientes.buscar');
    Route::resource('clientes', ClienteController::class)->except(['create', 'edit']);

    Route::get('/ventas/{id}/imprimir', [VentaController::class, 'printTicket'])->name('ventas.imprimir');
    Route::get('/ventas/serie-correlativo', [VentaController::class, 'getSerie'])->name('ventas.get-serie');
    Route::resource('ventas', VentaController::class)->except(['create', 'edit']);

    Route::get('/proveedores/buscar', [ProveedorController::class, 'buscar'])->name('proveedores.buscar');
    Route::resource('proveedores', ProveedorController::class)->except(['create', 'edit']);

    Route::get('/compras/{id}/imprimir', [CompraController::class, 'printTicket'])->name('compras.imprimir');
    Route::resource('compras', CompraController::class)->except(['create', 'edit']);

    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');


    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

    Route::get('/reportes/ventas', [ReporteController::class, 'reporteVentas'])->name('reportes.ventas');
    Route::get('/reportes/ventas/exportar', function (Request $request) {
        return Excel::download(new VentasExport($request->all()), 'reporte_ventas.xlsx');
    })->name('reportes.ventas.exportar');
    Route::post('/productos/importar', [ProductoController::class, 'import'])->name('productos.importar');
});
