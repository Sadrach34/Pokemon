@extends('layouts.main')

@section('top-title', 'Pokemon')

@section('title')
<i class=''>Pokemon - {{ isset($pokemon) ? 'Modificar' : 'Agregar' }}</i>
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'><a href= {{ route('pokemon') }}>pokemon</a></li>
<li class='breadcrumb-item active'>{{ isset($pokemon) ? 'Modificar' : 'Agregar' }}</li>
@endsection

@section('content')
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
                @if(isset($pokemon))
                    <form action={{ route('pokemon.update', $pokemon->id) }} method="POST">
                        <input type="hidden" name="id" value="{{ $pokemon->id }}">
                @else
                    <form action={{ route('pokemon.store') }} method="POST">
                @endif

                    @csrf
                    <label>Nombre:</label>
                    <input type='text' name='nombre' class='form-control my-2' required value={{  old('nombre', $pokemon->nombre ?? '' ) }}>
                    <label>Tipo1:</label>
                    <select name='primary' class='form-control my-2' required>
                        <option value=''>Seleccione un tipo</option>
                        <option value='1' @selected( old('primary', $pokemon->primary ?? '') == 1 )>Normal</option>
                        <option value='2' @selected( old('primary', $pokemon->primary ?? '') == 2 )>Fuego</option>
                        <option value='3' @selected( old('primary', $pokemon->primary ?? '') == 3 )>Agua</option>
                        <option value='4' @selected( old('primary', $pokemon->primary ?? '') == 4 )>Eléctrico</option>
                        <option value='5' @selected( old('primary', $pokemon->primary ?? '') == 5 )>Planta</option>
                        <option value='6' @selected( old('primary', $pokemon->primary ?? '') == 6 )>Hielo</option>
                        <option value='7' @selected( old('primary', $pokemon->primary ?? '') == 7 )>Lucha</option>
                        <option value='8' @selected( old('primary', $pokemon->primary ?? '') == 8 )>Veneno</option>
                        <option value='9' @selected( old('primary', $pokemon->primary ?? '') == 9 )>Tierra</option>
                        <option value='10' @selected( old('primary', $pokemon->primary  ?? '') == 10)>Volador</option>
                        <option value='11' @selected( old('primary', $pokemon->primary  ?? '') == 11)>Psíquico</option>
                        <option value='12' @selected( old('primary', $pokemon->primary  ?? '') == 12)>Bicho</option>
                        <option value='13' @selected( old('primary', $pokemon->primary  ?? '') == 13)>Roca</option>
                        <option value='14' @selected( old('primary', $pokemon->primary  ?? '') == 14)>Fantasma</option>
                        <option value='15' @selected( old('primary', $pokemon->primary  ?? '') == 15)>Dragón</option>
                        <option value='16' @selected( old('primary', $pokemon->primary  ?? '') == 16)>Siniestro</option>
                        <option value='17' @selected( old('primary', $pokemon->primary  ?? '') == 17)>Acero</option>
                        <option value='18' @selected( old('primary', $pokemon->primary  ?? '') == 18)>Hada</option>
                    </select>
                    
                    <label>Tipo2:</label>
                    <select name='secondary' class='form-control my-2'>
                        <option value=''>Seleccione un tipo</option>
                        <option value='1' @selected( old('secondary', $pokemon->secondary ?? '') == 1 )>Normal</option>
                        <option value='2' @selected( old('secondary', $pokemon->secondary ?? '') == 2 )>Fuego</option>
                        <option value='3' @selected( old('secondary', $pokemon->secondary ?? '') == 3 )>Agua</option>
                        <option value='4' @selected( old('secondary', $pokemon->secondary ?? '') == 4 )>Eléctrico</option>
                        <option value='5' @selected( old('secondary', $pokemon->secondary ?? '') == 5 )>Planta</option>
                        <option value='6' @selected( old('secondary', $pokemon->secondary ?? '') == 6 )>Hielo</option>
                        <option value='7' @selected( old('secondary', $pokemon->secondary ?? '') == 7 )>Lucha</option>
                        <option value='8' @selected( old('secondary', $pokemon->secondary ?? '') == 8 )>Veneno</option>
                        <option value='9' @selected( old('secondary', $pokemon->secondary ?? '') == 9 )>Tierra</option>
                        <option value='10' @selected( old('secondary', $pokemon->secondary  ?? '') == 10)>Volador</option>
                        <option value='11' @selected( old('secondary', $pokemon->secondary  ?? '') == 11)>Psíquico</option>
                        <option value='12' @selected( old('secondary', $pokemon->secondary  ?? '') == 12)>Bicho</option>
                        <option value='13' @selected( old('secondary', $pokemon->secondary  ?? '') == 13)>Roca</option>
                        <option value='14' @selected( old('secondary', $pokemon->secondary  ?? '') == 14)>Fantasma</option>
                        <option value='15' @selected( old('secondary', $pokemon->secondary  ?? '') == 15)>Dragón</option>
                        <option value='16' @selected( old('secondary', $pokemon->secondary  ?? '') == 16)>Siniestro</option>
                        <option value='17' @selected( old('secondary', $pokemon->secondary  ?? '') == 17)>Acero</option>
                        <option value='18' @selected( old('secondary', $pokemon->secondary  ?? '') == 18)>Hada</option>
                    </select>

                    <label>region:</label>
                    <input type='text' name='region' class='form-control my-2' required value={{ old('region', $pokemon->region ?? '' ) }}>

                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection