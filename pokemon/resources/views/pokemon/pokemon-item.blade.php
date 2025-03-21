@extends('layouts.main')

@section('top-title')
{{ $pokemon->nombre }} - Pokemon
@endsection

@section('title')
{{ $pokemon->nombre }} - Pokemon
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>Pokemon</li>
@endsection

@section('content')
@php
    $tipos = [
        1 => 'Normal',
        2 => 'Fuego',
        3 => 'Agua',
        4 => 'Eléctrico',
        5 => 'Planta',
        6 => 'Hielo',
        7 => 'Lucha',
        8 => 'Veneno',
        9 => 'Tierra',
        10 => 'Volador',
        11 => 'Psíquico',
        12 => 'Bicho',
        13 => 'Roca',
        14 => 'Fantasma',
        15 => 'Dragón',
        16 => 'Siniestro',
        17 => 'Acero',
        18 => 'Hada'
    ];
@endphp
<div class="row justify-content-center">
    <div class='col-6'>
        <div class='card'>
            <div class='card-body'>
                <h5 class='card-title'>{{ $pokemon->nombre }}</h5>
                <h6 class='card-subtitle mb2 text-muted'>Pokemon tipo - {{ $tipos[$pokemon->primary] ?? $pokemon->primary }}</h6>
                <h6 class='card-subtitle mb2 text-muted'>Pokemon tipo - {{ $tipos[$pokemon->secondary] ?? $pokemon->secondary }}</h6>
                <a href={{ route('pokemon.modificar', $pokemon->id) }} class='card-link'>Modificar</a>
                <a href='#' class='card-link'>Eliminar</a>
            </div>

        </div>
    </div>
</div>
@endsection