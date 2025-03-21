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
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>
@endsection