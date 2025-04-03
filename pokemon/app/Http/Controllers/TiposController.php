<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index()
    {
        $tipos = Tipo::where('status', '=', 1)->get();
        return view('tipos.index', compact('tipos'));
    }

    public function item($id)
    {
        $tipo = Tipo::where('id', '=', $id)->first();
        return view('tipos.tipos-item', compact('tipo'));
    }

    public function agregar()
    {
        return view('tipos.agregar');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|max:20|string',
        ], [
            'nombre.required' => 'El nombre es requerido',
        ]);

        Tipo::create([
            'nombre' => $data['nombre'],
            'status' => 1,
        ]);

        return redirect()->route('tipos')->with('message', 'Tipo agregado');
    }

    public function modificar($id)
    {
        $tipo = Tipo::where('id', '=', $id)->first();
        return view('tipos.agregar', compact('tipo'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'nombre' => 'required|max:20|string',
        ], [
            'id.required' => 'El id es requerido',
            'id.integer' => 'El id debe ser un número',
            'nombre.required' => 'El nombre es requerido',
        ]);

        $tipo = Tipo::where('id', '=', $data['id'])->first();

        if ($tipo) {
            $tipo->nombre = $data['nombre'];
            $tipo->save();

            return redirect()->route('tipos')->with('message', 'Tipo actualizado');
        } else {
            return redirect()->route('tipos')->with('message', 'Tipo no encontrado');
        }
    }

    public function delete(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
        ], [
            'id.required' => 'El id es requerido',
            'id.integer' => 'El id debe ser un número',
        ]);

        $tipo = Tipo::where('id', '=', $data['id'])->where('status', '=', 1)->first();

        if ($tipo) {
            $tipo->status = 0;
            $tipo->save();

            return redirect()->route('tipos')->with('success', 'Tipo eliminado');
        } else {
            return redirect()->route('tipos')->with('error', 'Tipo no encontrado');
        }
    }
}
