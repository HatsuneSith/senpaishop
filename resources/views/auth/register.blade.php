@extends('layout')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="login_sec">
            <h2>Registro</h2>
            <div class="col-md-6 log">                

                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <h5>Nombre</h5>                            
                            <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus>

                            @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif                            
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <h5>E-mail</h5>                            
                            <input id="email" type="text" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <h5>Contraseña</h5>                            
                            <input id="password" type="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <h5>Confirma Contraseña</h5>                            
                            <input id="password-confirm" type="password" name="password_confirmation" required>                            
                        </div>

                        <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                            <h5>Género</h5>                            
                            <select id="genero" type="genero" name="genero" required class="form-control">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>                      
                        </div>

                        <input type="submit" value="Registrar">
                    </form>
                </div>            
        </div>       
    </div>
</div>
@endsection
