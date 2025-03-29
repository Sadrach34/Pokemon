<?php

use App\Http\Controllers\Api\DebilidadesController;
use App\Http\Controllers\Api\PokemonController;
use App\Http\Controllers\Api\TiposController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pokemon', [PokemonController::class, 'todos']); // Para obtener todos los Pokémon
Route::get('/pokemon/{id}', [PokemonController::class, 'item']); // Para obtener un Pokémon por ID
Route::post('/pokemon', [PokemonController::class, 'create']); // Para crear un nuevo Pokémon
Route::put('/pokemon/{id}', [PokemonController::class, 'update']); // Para actualizar un Pokémon
Route::delete('/pokemon/{id}', [PokemonController::class, 'delete']); // Para eliminar un Pokémon

Route::get('/tipos', [TiposController::class, 'todos']);
Route::get('/tipos/{id}', [TiposController::class, 'item']);
Route::post('/tipos', [TiposController::class, 'create']);
Route::put('/tipos/{id}', [TiposController::class, 'update']);
Route::delete('/tipos/{id}', [TiposController::class, 'delete']);

Route::get('/debilidades', [DebilidadesController::class, 'todos']);
Route::get('/debilidades/{id}', [DebilidadesController::class, 'item']);
Route::post('/debilidades', [DebilidadesController::class, 'create']);
Route::put('/debilidades/{id}', [DebilidadesController::class, 'update']);
Route::delete('/debilidades/{id}', [DebilidadesController::class, 'delete']);