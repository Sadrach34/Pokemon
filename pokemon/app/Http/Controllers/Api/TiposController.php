<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function todos() {
        $Tipos = Tipo::where('status', '=', 1)->get();
        $list = [];

        foreach ($Tipos as $Tipo) {

            $object = [
                'id' => $Tipo->id,
                'nombre' => $Tipo->nombre,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $Tipo = Tipo::where('status', '=', 1)->where('id', '=', $id)->first();

        if ($Tipo) {
            $object = [
                'id' => $Tipo->id,
                'nombre' => $Tipo->nombre,
            ];

            return response()->json($object);
        }

        $object = [
            'code' => '404',
            'message' => 'no se contro el tipo',
        ];

        return response()->json($object, 404);
    }  

    public function create(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string',
        ]);
        $Tipo = Tipo::create([
            'nombre' => $data['nombre'],
        ]);

        if($Tipo) {
            $object = [
                'code' => '200',
                'message' => 'Tipo creado',
                'Tipo' => $Tipo,
            ];
            return response()->json($object, 200);
        }else {
            $object = [
                'code' => '500',
                'message' => 'Error al crear el Tipo',
            ];
            return response()->json($object, 500);
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
        ]);

        $Tipo = Tipo::where('id', '=', $id)->first();

        if($Tipo){
            $Tipo->nombre = $data['nombre'];
            $Tipo->save();

            return response()->json([
                'code' => 200,
                'message' => 'Tipo actualizado',
                'Tipo' => $Tipo,
            ]);
        }else {
            return response()->json([
                'code' => 404,
                'message' => 'Tipo no encontrado',
            ], 404);
        }
    }

    public function delete($id) {
        $Tipo = Tipo::where('id', '=', $id)->first();

        if($Tipo){
            $Tipo->status = 0;
            $Tipo->save();

            return response()->json([
                'code' => 200,
                'message' => 'Tipo eliminado',
            ]);
        }else {
            return response()->json([
                'code' => 404,
                'message' => 'Tipo no encontrado',
            ], 404);
        }
    }
}
