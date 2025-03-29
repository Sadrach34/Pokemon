@extends('layouts.main')

@section('top-title', 'Debilidades')

@section('title')
Debilidades
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>Debilidades</li>
@endsection

@section('action')
    <a class="btn btn-success" href= {{ route('debilidades.agregar') }}><i class="fa fa-plus"></i>
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
<table class="table table-bordered table-hover table info">
    <thead class="table-info">
        <tr>
            <th>id</th>
            <th>id_tipo</th>
            <th>debilidad</th>
            <th>acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($debilidades as $debilidad)
    <tr>
        <td>{{ $debilidad->id }}</td>
        <td>{{ $debilidad->tipo->nombre }}</td>
        <td>{{ $debilidad->tipoDebilidad->nombre }}</td>
        <td>
            <a href="{{ route('debilidades.item', $debilidad->id) }}" class="btn btn-sm btn-primary">
                <i class="fa fa-eye"></i>
            </a>
            <a href="{{ route('debilidades.modificar', $debilidad->id) }}" class="btn btn-sm btn-warning">
                <i class="fa fa-edit"></i>
            </a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $debilidad->id }}">
                <i class="fa fa-remove"></i>
            </button>
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>
@endsection

@section('modales')
    @foreach($debilidades as $debilidad)
        <div class="modal fade" id="exampleModal{{ $debilidad->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">'
                    <form method="POST" action="{{ route('debilidades.kranky') }}">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Desea darle kranky &copy;?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4> El debilidad 
                                <strong>{{ $debilidad->tipo->nombre }}</strong></h4>
                                <strong>{{ $debilidad->tipoDebilidad->nombre }}</strong></h4>
                            <input type="hidden" name="id" value="{{ $debilidad->id }}">
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