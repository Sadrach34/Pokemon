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
}
