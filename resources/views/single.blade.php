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
							<div class="prdt-info-grid">
								 <ul>
									 <li>- Brand : Fos Lighting</li>
									 <li>- Dimensions : (LXBXH) in cms of...</li>
									 <li>- Color : Brown</li>
									 <li>- Material : Wood</li>
								 </ul>
							</div>
							<div class="check">
							 <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Enter pin code for delivery &amp; availability</p>
							 <form class="navbar-form">
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="Enter Pin code">
								  </div>
								  <button type="submit" class="btn btn-default">Verify</button>
							 </form>
						    </div>
							<a href="#" class="add-cart item_add">ADD TO CART</a>							
					 </div>
				 </div>
				 <div class="clearfix"> </div>
			 </div>
	     </div>

	 </div>
</div>

@stop