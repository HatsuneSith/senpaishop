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
				<div class="col-md-3 feature-grid">
					<a href="{{ url('/single') }}/{{$articulo->id}}"><img src="{{asset("img/img1.jpg")}}" alt=""/>		
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
<!---->
<div class="offers">
	 <div class="container">
	 <h3>End of Season Sale</h3>
	 <div class="offer-grids">
		 <div class="col-md-6 grid-left">
			 <a href="#"><div class="offer-grid1">
				 <div class="ofr-pic">
					 <img src="{{asset("img/ofr2.jpg")}}" class="img-responsive" alt=""/>
				 </div>
				 <div class="ofr-pic-info">
					 <h4>Emergency Lights <br>& Led Bulds</h4>
					 <span>UP TO 60% OFF</span>
					 <p>Shop Now</p>
				 </div>
				 <div class="clearfix"></div>
			 </div></a>
		 </div>
		 <div class="col-md-6 grid-right">
			 <a href="#"><div class="offer-grid2">				 
				 <div class="ofr-pic-info2">
					 <h4>Flat Discount</h4>
					 <span>UP TO 30% OFF</span>
					 <h5>Outdoor Gate Lights</h5>
					 <p>Shop Now</p>
				 </div>
				 <div class="ofr-pic2">
					 <img src="{{asset("img/ofr3.jpg")}}" class="img-responsive" alt=""/>
				 </div>
				 <div class="clearfix"></div>
			 </div></a>
		 </div>
		 <div class="clearfix"></div>
	 </div>
	 </div>
</div>
@stop