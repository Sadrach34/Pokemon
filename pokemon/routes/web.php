<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonsController;
use App\Http\Controllers\DebilidadesController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\InicioController;

// Route::get('/', function () {
//     return view('home');
// });


//compuesta
Route::get('/', [InicioController::class, 'index'])->name('inicio');

//pokemon
Route::get('/pokemon', [PokemonsController::class, 'index'])->name('pokemon');

//debilidades
Route::get('/debilidades', [DebilidadesController::class, 'index'])->name('debilidades');

//tipos
Route::get('/tipos', [TiposController::class, 'index'])->name('tipos');

//ruta compleja
//  ...to be continued