<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos.index', compact('tipos'));
    }
    public function item($id) {
        $tipo = Tipo::find($id);
        if (!$tipo) {
            abort(404, 'tipo not found');
        }
        return view('tipos.tipos-item', compact('tipo'));
    }

    public function agregar() {
        return view('tipos.agregar');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
        ],[
            'nombre.required' => 'El nombre es requerido',
        ]);
        Tipo::create([
            'nombre' => $data['nombre'],
        ]);
        return redirect()->route('tipos');
    }

    public function modificar($id) {
        $tipo = Tipo::where('id', '=', $id)->first();
        return view('tipos.agregar', compact('tipo'));
    }

    public function update(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
        ],[
            'nombre.required' => 'El nombre es requerido',
        ]);
        $tipo = Tipo::where('id', '=', $request->id)->first();

        if($tipo) {
            $tipo->nombre = $data['nombre'];
            $tipo->save();
            return redirect()->route('tipos')->with('message', 'Tipo modificado');
        }else{
            return redirect()->route('tipos')->with('message', 'Tipo no encontrado');
        }
        
    }
}
