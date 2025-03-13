<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DebilidadesController extends Controller
{
    public function index()
    {
        return view('debilidades');
    }
}
