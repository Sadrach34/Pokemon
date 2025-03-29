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

@include('partials.messages')

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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pokemon->id }}">
                    <i class="fa fa-remove"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('modales')
    @foreach($pokemons as $pokemon)
        <div class="modal fade" id="exampleModal{{ $pokemon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">'
                    <form method="POST" action="{{ route('pokemon.kranky') }}">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Desea darle kranky &copy;?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4> El pokemon 
                                <strong>{{ $pokemon->nombre }}</strong> 
                                @if($pokemon->secondary) 
                                    con los tipos
                                @else 
                                    con el tipo 
                                @endif 
                                <strong> {{ $tipos[$pokemon->primary] ?? $pokemon->primary }}</strong> 
                                @if($pokemon->secondary) y 
                                    <strong> {{ $tipos[$pokemon->secondary] ?? $pokemon->secondary }}</strong>
                                @endif sera eliminado de la guarderia</h4>
                            <input type="hidden" name="id" value="{{ $pokemon->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cerrar </button>
                            <button type="submit" class="btn btn-success" > Aceptar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection