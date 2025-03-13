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
        </tr>
    </thead>
    <tbody>
        @foreach($tipos as $tipo)
        <tr>
            <td>{{ $tipo->id }}</td>
            <td>{{ $tipo->nombre }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection