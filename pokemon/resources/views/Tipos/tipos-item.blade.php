@extends('layouts.main')

@section('top-title')
{{ $tipo->nombre }} - tipo
@endsection

@section('title')
{{ $tipo->nombre }} - tipo
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'>tipo</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class='col-6'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='card-title'>{{ $tipo->nombre }}</h5>
                <a href={{ route('tipos.modificar', $tipo->id)}} class='card-link'>Modificar</a>
                <a href='#' class='card-link'>Eliminar</a>
            </div>

        </div>
    </div>
</div>
@endsection