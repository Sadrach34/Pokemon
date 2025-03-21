@extends('layouts.main')

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

@section('top-title')
{{ $tipos[$debilidad->id_tipo] ?? $debilidad->id_tipo }} - debilidad
@endsection

@section('title')
{{ $tipos[$debilidad->id_tipo] ?? $debilidad->id_tipo }} - debilidad
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>debilidad</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class='col-6'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='card-title'>{{ $tipos[$debilidad->id_tipo] ?? $debilidad->id_tipo }}</h5>
                <h6 class='card-subtitle mb2 text-muted'>debilidad tipo - {{ $tipos[$debilidad->id_tipo_debil] ?? $debilidad->id_tipo_debil }}</h6>
                <a href={{ route('debilidades.modificar', $debilidad->id ) }} class='card-link'>Modificar</a>
                <a href='#' class='card-link'>Eliminar</a>
            </div>
        </div>
    </div>
</div>
@endsection