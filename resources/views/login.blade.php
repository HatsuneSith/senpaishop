@extends('layout')
@section('contenido')
<div class="login_sec">
	 <div class="container">		
		 <h2>Login</h2>
		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the folling to continue.</p>
				 <p>If you have previously Login with us, <span>click here</span></p>
				 <form>
					 <h5>User Name</h5>	
					 <input type="text" value="">
					 <h5>Password</h5>
					 <input type="password" value="">					
					 <input type="submit" value="Login">	
						<a class="acount-btn" href="account.html">Create an Account</a>
				 </form>
				 <a href="#">Forgot Password ?</a>
					
		 </div>	
				
		 <div class="clearfix"></div>
	 </div>
</div>
@stop
<!---->