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
}
