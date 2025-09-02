<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AfectacionTipoController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('plantilla.item');
});
Route::get('/afectacion-tipos/select', [AfectacionTipoController::class, 'select'])->name('afectacion-tipos.select');
Route::get('/unidades/select', [UnidadController::class, 'select'])->name('unidades.select');
Route::get('/permisos/select', [RoleController::class, 'permisos'])->name('permisos.select');

Route::resource('unidades', UnidadController::class)->except(['create', 'edit']);
Route::resource('productos', ProductoController::class)->except(['create', 'edit']);
Route::resource('roles', RoleController::class)->except(['create', 'edit']);
