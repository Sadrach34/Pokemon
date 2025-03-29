@extends('layouts.main')

@section('top-title', 'Tipos')

@section('title')
<i class=''>Tipos</i>
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>Tipos</li>
@endsection

@section('action')
    <a class="btn btn-success" href= {{ route('tipos.agregar') }}><i class="fa fa-plus"></i>
        <i>Agregar</i>
    </a>
@endsection

@section('content')

@include('partials.messages')

<table class="table table-bordered table-hover table info">
    <thead class="table-info">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>created_at</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tipos as $tipo)
        <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->nombre }}</td>
            <td>{{ $tipo->created_at->format('d/M/Y h:i:s') }}, {{ $tipo->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('tipos.item', $tipo->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('tipos.modificar', $tipo->id) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $tipo->id }}">
                    <i class="fa fa-remove"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('modales')
    @foreach($tipos as $tipo)
        <div class="modal fade" id="exampleModal{{ $tipo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">'
                    <form method="POST" action="{{ route('tipos.kranky') }}">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Desea darle kranky &copy;?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4> El tipo 
                                <strong>{{ $tipo->nombre }}</strong> será eliminado</h4>
                            <input type="hidden" name="id" value="{{ $tipo->id }}">
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