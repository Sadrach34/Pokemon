<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debilidad;

class DebilidadesController extends Controller
{
    public function index()
    {
        $debilidades = Debilidad::all();
        return view('debilidades.index', ['debilidades' => $debilidades]);
    }

    public function item($id) {
        $debilidad = Debilidad::find($id);
        if (!$debilidad) {
            abort(404, 'debilidad not found');
        }
        return view('debilidades.debilidades-item', compact('debilidad'));
    }

    public function agregar() {
        return view('debilidades.agregar');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'tipo_id' => 'required|integer',
            'debilidad' => 'required|integer',

        ],[
            'tipo_id.required' => 'El tipo debil es requerido',
            'debilidad.required' => 'El tipo fuerte es requerido',
        ]);
        Debilidad::create([
            'tipo_id' => $data['tipo_id'],
            'debilidad' => $data['debilidad'],
        ]);
        return redirect()->route('debilidades');
    }

    public function modificar($id) {
        $debilidad = Debilidad::findOrFail($id); // Encuentra la debilidad o lanza un error 404
        return view('debilidades.agregar', compact('debilidad')); // Pasa la variable a la vista
    }

    public function update(Request $request) {
        $data = $request->validate([
            'id' => 'required|integer',
            'tipo_id' => 'required|integer',
            'debilidad' => 'required|integer',

        ],[
            'tipo_id.required' => 'El tipo debil es requerido',
            'debilidad.required' => 'El tipo fuerte es requerido',
        ]);
        
        $debilidad = Debilidad::where('id', '=', $data['id'])->first();
        
        if($debilidad){
            $debilidad->tipo_id = $data['tipo_id'];
            $debilidad->debilidad = $data['debilidad'];
            $debilidad->save();
            
            return redirect()->route('debilidades')->with('message', 'Debilidad modificada');
        }else{
            return redirect()->route('debilidades')->with('message', 'Debilidad no encontrada');
        }
    }
}
