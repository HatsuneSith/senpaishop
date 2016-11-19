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
<!---->
<script src="{{asset("js/bootstrap.js")}}"> </script>

<div class="items">
	 <div class="container">
		 <div class="items-sec">
		 	@foreach($articulos as $articulo)
				<div class="col-md-4 feature-grid">
					@if(count($articulo->imagenes) == 0)                        
                        <a href="{{ url('/single') }}/{{$articulo->id}}"><img src="{{ asset('/img/art_default.png')}}" alt=""/ width="100px">
                    @else                        
                        <a href="{{ url('/single') }}/{{$articulo->id}}"><img src="{{asset('../storage/app/articulos')}}/{{$articulo->id}}/{{$articulo->id}}.png" alt=""/ width="100px">
                    @endif
						<div class="arrival-info">
							<h4>{{$articulo->nombre}}</h4>
							<p>$ {{$articulo->precio}}</p>							
						</div>						
					</a>
				</div>			 	
			 @endforeach
		 </div>
	 </div>
</div>

@stop