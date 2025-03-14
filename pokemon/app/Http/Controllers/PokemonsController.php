<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokemon.index', compact('pokemons'));
    }

    public function item($id) {
        $pokemon = Pokemon::find($id);
        if (!$pokemon) {
            abort(404, 'Pokemon not found');
        }
        return view('pokemon.pokemon-item', compact('pokemon'));
    }

    public function agregar() {
        return view('pokemon.agregar');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
            'id_tipo1' => 'required|integer',
            'id_tipo2' => 'integer|nullable',
        ],[
            'nombre.required' => 'El nombre es requerido',
            'id_tipo1.required' => 'El tipo es requerido',
            'id_tipo1.integer' => 'El tipo debe ser un número',
            'id_tipo2.integer' => 'El tipo debe ser un número',
        ]);
        Pokemon::create([
            'nombre' => $data['nombre'],
            'id_tipo1' => $data['id_tipo1'],
            'id_tipo2' => $data['id_tipo2'],
        ]);
        return redirect()->route('pokemon');
    }
}
