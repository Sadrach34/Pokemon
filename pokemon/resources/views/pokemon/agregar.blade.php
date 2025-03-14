@extends('layouts.main')

@section('top-title', 'Pokemon')

@section('title')
<i class=''>Pokemon</i>
@endsection

@section('breadcrumbs')
<li class='breadcrumb-item'><a href= {{ route('inicio') }}>Inicio</a></li>
<li class='breadcrumb-item active'><a href= {{ route('pokemon') }}>pokemon</a></li>
<li class='breadcrumb-item active'>agregar</li>
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

                <form action={{ route('pokemon.store') }} method="POST">
                    @csrf
                    <label>Nombre:</label>
                    <input type='text' name='nombre' class='form-control my-2' required>
                    <label>Tipo1:</label>
                    <select name='id_tipo1' class='form-control my-2' required>
                        <option value=''>Seleccione un tipo</option>
                        <option value='1'>Normal</option>
                        <option value='2'>Fuego</option>
                        <option value='3'>Agua</option>
                        <option value='4'>Eléctrico</option>
                        <option value='5'>Planta</option>
                        <option value='6'>Hielo</option>
                        <option value='7'>Lucha</option>
                        <option value='8'>Veneno</option>
                        <option value='9'>Tierra</option>
                        <option value='10'>Volador</option>
                        <option value='11'>Psíquico</option>
                        <option value='12'>Bicho</option>
                        <option value='13'>Roca</option>
                        <option value='14'>Fantasma</option>
                        <option value='15'>Dragón</option>
                        <option value='16'>Siniestro</option>
                        <option value='17'>Acero</option>
                        <option value='18'>Hada</option>
                    </select>
                    
                    <label>Tipo2:</label>
                    <select name='id_tipo2' class='form-control my-2'>
                        <option value=''>Seleccione un tipo</option>
                        <option value='1'>Normal</option>
                        <option value='2'>Fuego</option>
                        <option value='3'>Agua</option>
                        <option value='4'>Eléctrico</option>
                        <option value='5'>Planta</option>
                        <option value='6'>Hielo</option>
                        <option value='7'>Lucha</option>
                        <option value='8'>Veneno</option>
                        <option value='9'>Tierra</option>
                        <option value='10'>Volador</option>
                        <option value='11'>Psíquico</option>
                        <option value='12'>Bicho</option>
                        <option value='13'>Roca</option>
                        <option value='14'>Fantasma</option>
                        <option value='15'>Dragón</option>
                        <option value='16'>Siniestro</option>
                        <option value='17'>Acero</option>
                        <option value='18'>Hada</option>
                    </select>

                    <button class="btn btn-success mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection