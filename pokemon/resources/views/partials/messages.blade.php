@if(\Session::has('success'))
<hr>
<div class="alert alert-success my-3">
    <div class="card-header">
        <h4 class="mb-0">Exito</h4>
    </div>
    <div class="card-body">
        {{!! \Session::get('success') !!}}
    </div>
</div>
@endif

@if(\Session::has('error'))
<hr>
<div class="alert alert-danger my-3">
    <div class="card-header">
        <h4 class="mb-0">Error</h4>
    </div>
    <div class="card-body">
        {{!! \Session::get('error') !!}}
    </div>
</div>
@endif

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