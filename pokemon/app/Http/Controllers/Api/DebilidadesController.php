<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Debilidad;
use Illuminate\Http\Request;

class DebilidadesController extends Controller
{
    public function todos() {
        $Debilidades = Debilidad::where('status', '=', 1)->get();
        $list = [];

        foreach ($Debilidades as $Debilidad) {

            $object = [
                'id' => $Debilidad->id,
                'tipo_id' => $Debilidad->tipo_id,
                'debilidad' => $Debilidad->debilidad,
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $Debilidad = Debilidad::where('status', '=', 1)->where('id', '=', $id)->first();

        if ($Debilidad) {
            $object = [
                'id' => $Debilidad->id,
                'tipo_id' => $Debilidad->tipo_id,
                'debilidad' => $Debilidad->debilidad,
            ];

            return response()->json($object);
        }

        $object = [
            'code' => '404',
            'message' => 'no se contro el Debilidad',
        ];

        return response()->json($object, 404);
    }  

    public function create(Request $request) {
        $data = $request->validate([
            'tipo_id' => 'required|numeric',
            'debilidad' => 'required|numeric',
        ]);
        $Debilidad = Debilidad::create([
            'tipo_id' => $data['tipo_id'],
            'debilidad' => $data['debilidad'],
        ]);

        if($Debilidad) {
            $object = [
                'code' => '200',
                'message' => 'Debilidad creada',
                'Debilidad' => $Debilidad,
            ];
            return response()->json($object, 200);
        }else {
            $object = [
                'code' => '500',
                'message' => 'Error al crear el Debilidad',
            ];
            return response()->json($object, 500);
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'tipo_id' => 'required|numeric',
            'debilidad' => 'required|numeric',
        ]);

        $Debilidad = Debilidad::where('id', '=', $id)->first();

        if($Debilidad){
            $Debilidad->tipo_id = $data['tipo_id'];
            $Debilidad->debilidad = $data['debilidad'];
            $Debilidad->save();

            return response()->json([
                'code' => 200,
                'message' => 'Debilidad actualizado',
                'Debilidad' => $Debilidad,
            ]);
        }else {
            return response()->json([
                'code' => 404,
                'message' => 'Debilidad no encontrado',
            ], 404);
        }
    }

    public function delete($id) {
        $Debilidad = Debilidad::where('id', '=', $id)->first();

        if($Debilidad){
            $Debilidad->status = 0;
            $Debilidad->save();

            return response()->json([
                'code' => 200,
                'message' => 'Debilidad eliminado',
            ]);
        }else {
            return response()->json([
                'code' => 404,
                'message' => 'Debilidad no encontrado',
            ], 404);
        }
    }
}
