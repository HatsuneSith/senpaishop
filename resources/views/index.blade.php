@extends('layout')

@section('contenido')
<div class="slider">
	  <div class="callbacks_container">
	     <ul class="rslides" id="slider">
	         <li>
				 <div class="banner1">				  
					  <div class="banner-info">
					  <h3></h3>
					  <p></p>
					  </div>
				 </div>
	         </li>
	         <li>
				 <div class="banner2">
					 <div class="banner-info">
					 <h3></h3>
					 <p></p>
					 </div>
				 </div>
			 </li>
	         <li>
	             <div class="banner3">
	        	 <div class="banner-info">
	        	 <h3></h3>
	          	 <p></p>
				 </div>
				 </div>
	         </li>
	    </ul>
	</div>
</div>

<div class="items">
	 <div class="container">
		 <div class="items-sec">
		 	@foreach($articulos as $articulo)

				<a href="{{url('/single/')}}/{{$articulo->id}}"><div class="product-grid">
						<div class="more-product"><span></span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							@if(count($articulo->imagenes) == 0)
                                <img src="{{ asset('/img/art_default.png')}}" class="img-responsive">
                            @else
                                <img src="{{ asset('../storage/app/articulos')}}/{{$articulo->id}}/{{$articulo->id}}.png" class="img-responsive">
                            @endif
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">
							@if($articulo->cantidad == 0)
								<button  style="background-color:#d61414;"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Agotado</button>
							@else
								<button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Compra ya</button>
							@endif
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4> {{$articulo->nombre}}</h4>								
								<span class="item_price">${{$articulo->precio}}</span>
								
								<div class="clearfix"> </div>
							</div>												
							
						</div>
					</div>			 	
			 @endforeach
		 </div>
	 </div>
</div>

@stop