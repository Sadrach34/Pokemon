@extends('layouts.main')

@section('top-title', 'Debilidades')

@section('title')
Debilidades
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>Debilidades</li>
@endsection

@section('content')
@php
    $tipos = [
        1 => 'Normal',
        2 => 'Fuego',
        3 => 'Agua',
        4 => 'Eléctrico',
        5 => 'planta',
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

<table class="table table-bordered table-hover table info">
    <thead class="table-info">
        <tr>
            <th>id</th>
            <th>id_tipo</th>
            <th>id_tipo_debil</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($debilidades as $debilidad)
    <tr>
        <td>{{ $debilidad->id }}</td>
        <td>{{ $tipos[$debilidad->id_tipo] ?? $debilidad->id_tipo }}</td>
        <td>{{ $tipos[$debilidad->id_tipo_debil] ?? $debilidad->id_tipo_debil }}</td>
    </tr>    
    @endforeach
    </tbody>
</table>
@endsection