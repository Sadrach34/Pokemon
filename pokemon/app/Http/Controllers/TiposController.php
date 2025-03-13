<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipos', compact('tipos'));
    }
}
