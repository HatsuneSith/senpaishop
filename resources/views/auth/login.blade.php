@extends('layout')

@section('contenido')
<div class="container">
    <div class="row">
        
        <div class="login_sec">
             <div class="container">        
                 <h2>Login</h2>
                 <div class="col-md-6 log">          
                         <p>Welcome, please enter the folling to continue.</p>
                         <p>If you have previously Login with us, <span>click here</span></p>                                                                                                 
                        <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <h5>E-mail</h5>                                
                                    <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus>

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
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>                                    
                                </div>
                                                                
                                <input type="submit" value="Login">
                                <a class="acount-btn" href="{{ url('/register') }}">Create an Account</a>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </form>
                 </div> 
                        
                 <div class="clearfix"></div>
             </div>
        </div>
        
    </div>
</div>

@stop
