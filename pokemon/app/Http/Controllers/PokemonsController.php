<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    public function index()
    {
        return view('pokemon');
    }
}
