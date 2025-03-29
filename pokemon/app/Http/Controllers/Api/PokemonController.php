<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller{
    public function todos() {
        $pokemons = Pokemon::where('status', '=', 1)->get();
        $list = [];

        foreach ($pokemons as $pokemon) {

            $object = [
                'id' => $pokemon->id,
                'nombre' => $pokemon->nombre,
                'primary' => $pokemon->primary,
                'secondary' => $pokemon->secondary,
                'region' => $pokemon->region,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $pokemon = Pokemon::where('status', '=', 1)->where('id', '=', $id)->first();

        if ($pokemon) {
            $object = [
                'id' => $pokemon->id,
                'nombre' => $pokemon->nombre,
                'primary' => $pokemon->primary,
                'secondary' => $pokemon->secondary,
                'region' => $pokemon->region,
            ];

            return response()->json($object);
        }

        $object = [
            'code' => '404',
            'message' => 'no se contro el pokemon',
        ];

        return response()->json($object, 404);
    }  

    public function create(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
            'primary' => 'required|integer',
            'secondary' => 'integer|nullable',
            'region' => 'string|required',
        ]);
        $pokemon = Pokemon::create([
            'nombre' => $data['nombre'],
            'primary' => $data['primary'],
            'secondary' => $data['secondary'],
            'region' => $data['region'],
        ]);

        if($pokemon) {
            $object = [
                'code' => '200',
                'message' => 'Pokemon creado',
                'pokemon' => $pokemon,
            ];
            return response()->json($object, 200);
        }else {
            $object = [
                'code' => '500',
                'message' => 'Error al crear el pokemon',
            ];
            return response()->json($object, 500);
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
            'primary' => 'required|integer',
            'secondary' => 'integer|nullable',
            'region' => 'string|required',
        ]);

        $pokemon = Pokemon::where('id', '=', $id)->first();

        if($pokemon){
            $pokemon->nombre = $data['nombre'];
            $pokemon->primary = $data['primary'];
            $pokemon->secondary = $data['secondary'];
            $pokemon->region = $data['region'];
            $pokemon->save();

            return response()->json([
                'code' => 200,
                'message' => 'Pokemon actualizado',
                'pokemon' => $pokemon,
            ]);
        }else {
            return response()->json([
                'code' => 404,
                'message' => 'Pokemon no encontrado',
            ], 404);
        }
    }

    public function delete($id) {
        $pokemon = Pokemon::where('id', '=', $id)->first();

        if($pokemon){
            $pokemon->status = 0;
            $pokemon->save();

            return response()->json([
                'code' => 200,
                'message' => 'Pokemon eliminado',
            ]);
        }else {
            return response()->json([
                'code' => 404,
                'message' => 'Pokemon no encontrado',
            ], 404);
        }
    }
}
