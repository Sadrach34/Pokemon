@extends('layouts.main')

@section('top-title', 'Tipos')

@section('title')
Tipos
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
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tipos as $tipo)
        <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->nombre }}</td>
            <td>
                <a href="{{ route('tipos.item', $tipo->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('tipos.modificar', $tipo->id) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection