@extends('layout')

@section('contenido')
<div class="container home-cont">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Has iniciado sesión {{ $usuario->nombre }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
