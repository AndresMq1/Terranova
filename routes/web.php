<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\FincaController;
use App\Http\Controllers\GanadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TerrenoController;
use App\Models\Ganado;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('paginaPrincipal');
});

Auth::routes();

Auth::routes();

Route::post('/crear-finca',[FincaController::class,'store'])->name('finca.store');

Route::put('/finca/{id}',[FincaController::class, 'update'])->name('finca.update');

Route::delete('/finca/{id}', [FincaController::class, 'destroy'])->name('finca.destroy');

Route::resource('ganado', GanadoController::class);

Route::resource('terreno', TerrenoController::class);

Route::post('/ganado', [GanadoController::class,'store'])->name('ganado.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/CalendarioVendedor', [CalendarioController::class, 'index'])->name('calendario.vendedor');
Route::resource('calendarios', CalendarioController::class);
Route::put('/calendarios/{id}', [CalendarioController::class, 'update'])->name('calendarios.update');

Route::get('/CitasCliente', [CitaController::class, 'index'])->name('citas.cliente');
Route::resource('/citas', CitaController::class);
Route::delete('/citas/{id}', [CitaController::class, 'destroy'])->name('citas.destroy');