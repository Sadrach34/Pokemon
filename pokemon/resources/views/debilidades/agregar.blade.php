@extends('layouts.main')

@section('top-title', 'debilidades')

@section('title')
<i class=''>{{ isset($debilidad) ? 'Modificar' : 'Agregar' }}</i>
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'><a href= {{ route('debilidades') }}>debilidades</a></li>
<li class='breadcrumb-item active'>{{ isset($debilidad) ? 'Modificar' : 'Agregar' }}</li>
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
        <div class='card'>
            <div class='card-body'>
                @if(isset($debilidad))
                    <form action={{ route('debilidades.update', $debilidad->id) }} method="POST">
                        <input type="hidden" name="id" value="{{ $debilidad->id }}">
                @else
                    <form action={{ route('debilidades.store') }} method="POST">
                @endif
                    @csrf
                    <label>tipo debil:</label>
                    <select name='tipo_id' class='form-control my-2' required>
                        <option value=''>Seleccione un tipo</option>
                        <option value='1' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 1)>Normal</option>
                        <option value='2' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 2)>Fuego</option>
                        <option value='3' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 3)>Agua</option>
                        <option value='4' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 4)>Eléctrico</option>
                        <option value='5' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 5)>Planta</option>
                        <option value='6' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 6)>Hielo</option>
                        <option value='7' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 7)>Lucha</option>
                        <option value='8' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 8)>Veneno</option>
                        <option value='9' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 9)>Tierra</option>
                        <option value='10' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 10)>Volador</option>
                        <option value='11' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 11)>Psíquico</option>
                        <option value='12' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 12)>Bicho</option>
                        <option value='13' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 13)>Roca</option>
                        <option value='14' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 14)>Fantasma</option>
                        <option value='15' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 15)>Dragón</option>
                        <option value='16' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 16)>Siniestro</option>
                        <option value='17' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 17)>Acero</option>
                        <option value='18' @selected(old('tipo_id', isset($debilidad) ? $debilidad->tipo_id : null) == 18)>Hada</option>
                    </select>
                    
                    <label>tipo fuerte:</label>
                    <select name='debilidad' class='form-control my-2'>
                        <option value=''>Seleccione un tipo</option>
                        <option value='1' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 1)>Normal</option>
                        <option value='2' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 2)>Fuego</option>
                        <option value='3' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 3)>Agua</option>
                        <option value='4' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 4)>Eléctrico</option>
                        <option value='5' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 5)>Planta</option>
                        <option value='6' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 6)>Hielo</option>
                        <option value='7' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 7)>Lucha</option>
                        <option value='8' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 8)>Veneno</option>
                        <option value='9' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 9)>Tierra</option>
                        <option value='10' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 10)>Volador</option>
                        <option value='11' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 11)>Psíquico</option>
                        <option value='12' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 12)>Bicho</option>
                        <option value='13' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 13)>Roca</option>
                        <option value='14' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 14)>Fantasma</option>
                        <option value='15' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 15)>Dragón</option>
                        <option value='16' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 16)>Siniestro</option>
                        <option value='17' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 17)>Acero</option>
                        <option value='18' @selected(old('debilidad', isset($debilidad) ? $debilidad->debilidad : null) == 18)>Hada</option>
                    </select>

                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection