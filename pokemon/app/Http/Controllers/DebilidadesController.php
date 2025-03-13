<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debilidad;

class DebilidadesController extends Controller
{
    public function index()
    {
        $debilidades = Debilidad::all();
        return view('debilidades', ['debilidades' => $debilidades]);
    }
}
