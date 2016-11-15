@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Has iniciado sesión {{ $usuario->nombre }}!                

                @if($usuario->verificado == 0)                    
                    <p>
                    No has registrado tu dirección de correo electrónico. Por favor revisa tu bandeja de entrada.
                @endif

                @if(isset($verificado))
                    <p>
                    Has verificado tu cuenta exitosamente!                    
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
