@extends('layouts.main')

@section('top-title', 'Pokemon')

@section('title')
<i class=''>Pokemon</i>
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>Pokemon</li>
@endsection

@section('action')
    <a class="btn btn-success" href= {{ route('pokemon.agregar') }}><i class="fa fa-plus"></i>
        <i>Agregar</i>
    </a>
@endsection

@section('content')
@if(\Session::has('message'))
    <div class="alert alert-primary my-3">
        <div class="card-header">
            <h4 class="mb-0">Atencion</h4>
        </div>
        <div class="card-body">
            {{!! \Session::get('message') !!}}
        </div>
    </div>
@endif

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
<table class="table table-bordered table-hover table info">
    <thead class="table-info">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>primary</th>
            <th>secondary</th>
            <th>region</th>
            <th>created_at</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pokemons as $pokemon)
        <tr>
            <td>{{ $pokemon->id }}</td>
            <td>{{ $pokemon->nombre }}</td>
            <td>{{ $tipos[$pokemon->primary] ?? $pokemon->primary }}</td>
            <td>{{ $tipos[$pokemon->secondary] ?? $pokemon->secondary }}</td>
            <td>{{ $pokemon->region }}</td>
            <td>{{ $pokemon->created_at->format('d/M/Y h:i:s') }}, {{ $pokemon->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('pokemon.item', $pokemon->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('pokemon.modificar', $pokemon->id) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection