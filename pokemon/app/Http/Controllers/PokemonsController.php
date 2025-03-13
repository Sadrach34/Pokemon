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
        $pokemon = Pokemon::where('id', $id)->first();
        return view('pokemon.item', compact('pokemon'));
    }
}
