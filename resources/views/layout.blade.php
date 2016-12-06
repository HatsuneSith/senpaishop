<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>SenpaiShop</title>
<link href="{{asset("css/bootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme style-->
<link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" media="all" />	
<link href="{{asset("css/memenu.css")}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
<link href="{{asset("css/custom.css")}}" rel="stylesheet" type="text/css" media="all" />
<!--//theme style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

</head>
<body> 
<!--header-->	

<div class="header-top">
	<div class="header-bottom">			
		<div class="logo">
			<h1><a href="{{ url('/') }}"><img src="{{ asset('/img/logo.png') }}" alt=""></a></h1>
		</div>		
		 <!---->		 
		 <div class="top-nav">
			<ul class="memenu skyblue">				
				<li class="grid"><a href="#">Artículos</a>
					<div class="mepanel">
						<div class="row">
							@foreach($categorias as $categoria)
								<div class="col1 me-one">
									<h4>{{ $categoria->nombre }}</h4>
									<ul>
										@foreach($categoria->sub_categorias as $sc)
											<li><a href="{{ url('/product') }}/{{ $sc->id }}">{{ $sc->nombre }}</a></li>
										@endforeach
									</ul>
								</div>
							@endforeach							
						</div>
					</div>
				</li>
				@if(Auth::guest())
					<li class="grid"><a href="{{ url('/login') }}">Login</a></li>
                    <li class="grid"><a href="{{ url('/register') }}">Registrar</a></li>
				@else
					<li class="grid"><a href="">Panel</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<a href="{{ url('/compras') }}"><h4>Historial de Compras</h4></a>
								</div>
							</div>
						</div>
					</li>
					@if(Auth::user()->rol->nombre == 'Admin')
						<li class="grid"><a href="#">Administrar</a>
							<div class="mepanel">
								<div class="row">
									<div class="col1 me-one">										
										<a href="{{ url('/agregar-articulo') }}"><h4>Dar de alta articulo</h4></a>
										<a href="{{ url('/inventario') }}"><h4>Inventario</h4></a>
										<a href="{{ url('/ventas') }}"><h4>Ventas</h4></a>
									</div>
								</div>
							</div>
						</li>						
					@endif
					<li>
	                    <a href="{{ url('/logout') }}"
	                        onclick="event.preventDefault();
	                                 document.getElementById('logout-form').submit();">
	                        Cerrar Sesión
	                    </a>

	                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	                        {{ csrf_field() }}
	                    </form>
	                </li>
				@endif				
			</ul>
			<div class="clearfix"> </div>
		 </div>		
		@if(Auth::check())
			<div class="cart box_1">		
				<a href="checkout.html">
					<div class="total">
						<span><a href="{{url('/carrito')}}">Carrito <span class="badge">{{ @Auth::user()->carrito->total_articulos()}}</span></a></span>
					</div>
					<a href="{{url('/carrito')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
				</a>				
			 	<div class="clearfix"> </div>
			</div>
		@endif		
		<div class="clearfix"> 
		</div>
	</div>
	<div class="clearfix"> 		
	</div>
</div>

	@yield('contenido')
 <!---->
<div class="footer">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-3 about-us">
				 <h3>About Bananas</h3>
				 <p>The banana is an edible fruit, botanically a berry, produced by several kinds of large herbaceous flowering plants in the genus Musa.</p>
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Senpai Club Network</h3>
					<ul class="nav-bottom">
						<li><a href="#">Hey</a></li>
						<li><a href="#">We are</a></li>
						<li><a href="#">Senpai Club</a></li>
						<li><a href="#">Helping our dear kohais</a></li>
						<li><a href="#">In problems</a></li>	
					</ul>					
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Marcas</h3>
					<ul class="nav-bottom">
						<li><a href="#">Good Smile</a></li>
						<li><a href="#">Namco</a></li>
						<li><a href="#">Black Monster</a></li>
						<li><a href="#">Shonen Jump</a></li>
						<li><a href="#">Mercado Garmendia</a></li>	
					</ul>					
			 </div>
			 <div class="col-md-3 ftr-grid">
					<h3>Integrantes</h3>
					<ul class="nav-bottom">
						<li><a href="#">Lopez Lugo Erik</a></li>
						<li><a href="#">Marquez Barraza Luis Arturo</a></li>
						<li><a href="#">Ojeda Martinez Betillo</a></li>
						<li><a href="#">Silva Alfaro Hugo Cesar</a></li>
					</ul>					
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<div class="copywrite">
	 <div class="container">
		 <div class="copy">
			 <p>© 2015 Lighting. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		 </div>
		 <div class="social">							
				<a href="#"><i class="facebook"></i></a>
				<a href="#"><i class="twitter"></i></a>
				<a href="#"><i class="dribble"></i></a>	
				<a href="#"><i class="google"></i></a>	
				<a href="#"><i class="youtube"></i></a>	
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="{{asset("js/simpleCart.min.js")}}"> </script>
<!-- start menu -->
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->
<script src="{{asset("js/memenu.js")}}"></script>
<script src="{{asset("js/custom.js")}}"></script>
<!---->
<script src="{{asset("js/responsiveslides.min.js")}}"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: false,
      });
    });
  </script>
  @yield('scripts')
</body>
</html>
