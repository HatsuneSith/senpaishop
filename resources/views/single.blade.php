@extends('layout')

@section('contenido')
<div class="product">
	 <div class="container">				
		 <div class="product-price1">
			 <div class="top-sing">
				  <div class="col-md-7 single-top">	
					 <div class="flexslider">

						
						<div class="thumb-image"> <img src="{{asset("img/img1.jpg")}}" data-imagezoom="true" class="img-responsive" alt=""/> </div>

						</div>					 					 

				 </div>	
			     <div class="col-md-5 single-top-in simpleCart_shelfItem">
					  <div class="single-para ">
						 <h4> {{$producto->nombre}}</h4>							
							<h5 class="item_price">$ {{$producto->precio}}</h5>							
							<p class="para">{{$producto->descripcion}}</p>
							

















					 </div>
				 </div>
			
			 </div>
	     </div>

	 </div>
</div>

@stop