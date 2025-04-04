<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function index(){
        $pokemons = Pokemon::where('status', '=', 1)->get();
        return view('pokemon.index', compact('pokemons'));
    }

    public function item($id) {
        $pokemon = Pokemon::where('id', '=', $id)->first();
        return view('pokemon.pokemon-item', compact('pokemon'));
    }

    public function agregar() {
        return view('pokemon.agregar');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
            'primary' => 'required|integer',
            'secondary' => 'integer|nullable',
            'region' => 'string',
        ],[
            'nombre.required' => 'El nombre es requerido',
            'primary.required' => 'El tipo es requerido',
            'primary.integer' => 'El tipo debe ser un número',
            'secondary.integer' => 'El tipo debe ser un número',
            'region.requiered' => 'La region es requerida',
        ]);
        Pokemon::create([
            'nombre' => $data['nombre'],
            'primary' => $data['primary'],
            'secondary' => $data['secondary'],
            'region' => $data['region'],
        ]);
        return redirect()->route('pokemon')->with('message', 'Pokemon agregado');
    }

    public function modificar($id) {
        // $pokemon = Pokemon::find($id); // truena con error 500 si no encuentra el pokemon
        // $pokemon = Pokemon::findOrFail($id); // truena con error 404 si no encuentra el pokemon
        $pokemon = Pokemon::where('id', '=', $id)->first(); 
        return view('pokemon.agregar', compact('pokemon'));
    }

    public function update(Request $request) {
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|max:20|string',
            'primary' => 'required|integer',
            'secondary' => 'integer|nullable',
            'region' => 'string',
        ],[
            'nombre.required' => 'El nombre es requerido',
            'primary.required' => 'El tipo es requerido',
            'primary.integer' => 'El tipo debe ser un número',
            'secondary.integer' => 'El tipo debe ser un número',
            'region' => 'no es valido',
        ]);

        $pokemon = Pokemon::where('id', '=', $data['id'])->first();

        if($pokemon){
            $pokemon->nombre = $data['nombre'];
            $pokemon->primary = $data['primary'];
            $pokemon->secondary = $data['secondary'];
            $pokemon->region = $data['region'];
            $pokemon->save();

            return redirect()->route('pokemon')->with('message', 'Pokemon actualizado');
        }else{
            return redirect()->route('pokemon')->with('message', 'Pokemon no encontrado');
        }
    }

    public function delete(Request $request) {
        $data = $request->validate([
            'id' => 'required|integer',
        ],[
            'id.required' => 'El id es requerido',
            'id.integer' => 'El id debe ser un número',
        ]);
        $pokemon = Pokemon::where('id', '=', $data['id'])->where('status', '=', 1)->first();
        if($pokemon){
            $pokemon->status = 0;
            $pokemon->save();
            return redirect()->route('pokemon')->with('success', 'Pokemon krankeado');
        }else{
            return redirect()->route('pokemon')->with('error', 'Pokemon no encontrado');
        }
    }
}