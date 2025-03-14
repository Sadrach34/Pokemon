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
Route::get('/pokemon/agregar', [PokemonsController::class, 'agregar'])->name('pokemon.agregar');
Route::get('/pokemon/{id}', [PokemonsController::class, 'item'])->name('pokemon.item');

Route::post('/pokemon/agregar', [PokemonsController::class, 'store'])->name('pokemon.store');

//debilidades
Route::get('/debilidades', [DebilidadesController::class, 'index'])->name('debilidades');
Route::get('/debilidades/{id}', [DebilidadesController::class, 'item'])->name('debilidades.item');

//tipos
Route::get('/tipos', [TiposController::class, 'index'])->name('tipos');
Route::get('/tipos/{id}', [TiposController::class, 'item'])->name('tipos.item');

//

//ruta compleja
//  ...to be continued