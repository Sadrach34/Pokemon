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
Route::get('/pokemon/agregar', [PokemonsController::class, 'agregar'])->name('pokemon.agregar');
Route::get('/pokemon/{id}', [PokemonsController::class, 'item'])->name('pokemon.item');
Route::post('/pokemon/agregar', [PokemonsController::class, 'store'])->name('pokemon.store');
Route::get('/pokemon/{id}/modificar', [PokemonsController::class, 'modificar'])->name('pokemon.modificar');
Route::post('/pokemon/{id}/modificar', [PokemonsController::class, 'update'])->name('pokemon.update');

//debilidades
Route::get('/debilidades', [DebilidadesController::class, 'index'])->name('debilidades');
Route::get('/debilidades/agregar', [DebilidadesController::class, 'agregar'])->name('debilidades.agregar');
Route::get('/debilidades/{id}', [DebilidadesController::class, 'item'])->name('debilidades.item');
Route::post('/debilidades/agregar', [DebilidadesController::class, 'store'])->name('debilidades.store');
Route::get('/debilidades/{id}/modificar', [DebilidadesController::class, 'modificar'])->name('debilidades.modificar');
Route::post('/debilidades/{id}/modificar', [DebilidadesController::class, 'update'])->name('debilidades.update');

//tipos
Route::get('/tipos', [TiposController::class, 'index'])->name('tipos');
Route::get('/tipos/agregar', [TiposController::class, 'agregar'])->name('tipos.agregar');
Route::get('/tipos/{id}', [TiposController::class, 'item'])->name('tipos.item');
Route::post('/tipos/agregar', [TiposController::class, 'store'])->name('tipos.store');
Route::get('/tipos/{id}/modificar', [TiposController::class, 'modificar'])->name('tipos.modificar');
Route::post('/tipos/{id}/modificar', [TiposController::class, 'update'])->name('tipos.update');

//ruta compleja
//  ...to be continued