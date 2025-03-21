@extends('layouts.main')

@section('top-title', 'Tipos')

@section('title')
<i class=''>Tipos - {{ isset($tipo) ? 'Modificar' : 'Agregar' }}</i>
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'><a href= {{ route('tipos') }}>Tipos</a></li>
<li class='breadcrumb-item active'>{{ isset($tipo) ? 'Modificar' : 'Agregar' }}</li>
@endsection

@section('content')
@if($errors->any()) 
			<div class="card text-bg-danger mb-3">
                <div class="card-header">Advertencia</div>
                <div class="card-body">
                <h5 class="card-title">Se encontraron los siguientes errores:</h5>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
                </div>
			</div>
		@endif
<div class="row justify-content-center">
    <div class='col-6'>
        @if($errors->any()) 
			<div class="card text-bg-danger mb-3">
                <div class="card-header">Advertencia</div>
                <div class="card-body">
                <h5 class="card-title">Se encontraron los siguientes errores:</h5>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
                </div>
			</div>
		@endif

        <div class='card'>
            <div class='card-body'>
                @if(isset($tipo))
                    <form action={{ route('tipos.update', $tipo->id) }} method="POST">
                        <input type="hidden" name="id" value="{{ $tipo->id }}">
                @else
                    <form action={{ route('tipos.store') }} method="POST">
                @endif
                        @csrf
                    <label>Nombre:</label>
                    <input type='text' name='nombre' class='form-control my-2' required value={{ old('nombre', $tipo->nombre ?? '') }}>
                    
                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection