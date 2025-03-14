@extends('layouts.main')

@section('top-title', 'Tipos')

@section('title')
Tipos
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>Tipos</li>
@endsection

@section('content')
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
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection