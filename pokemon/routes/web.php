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
Route::get('inicio', [InicioController::class, 'index'])->name('inicio');

//pokemon
Route::get('/pokemon', [PokemonsController::class, 'index'])->name('pokemon');
Route::get('/pokemon/{id}', [PokemonsController::class, 'item'])->name('pokemon.item');

//debilidades
Route::get('/debilidades', [DebilidadesController::class, 'index'])->name('debilidades');

//tipos
Route::get('/tipos', [TiposController::class, 'index'])->name('tipos');

//

//ruta compleja
//  ...to be continued