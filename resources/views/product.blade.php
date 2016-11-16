@extends('layout')

@section('contenido')
<div class="product-model">	 
	 <div class="container">
		<ol class="breadcrumb">		  
		</ol>
		<h2>Artículos</h2>			
		<div class="col-md-9 product-model-sec">
			

					@foreach($productos as $pr)	

					<a href="../single/{{$pr->id}}"><div class="product-grid">
						<div class="more-product"><span></span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="../storage/app/articulos/{{$pr->id}}.jpg" class="img-responsive" alt="">
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Compra ya</button>
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
								<h4> {{$pr->nombre}}</h4>								
								<span class="item_price">${{$pr->precio}}</span>
								
								<div class="clearfix"> </div>
							</div>												
							
						</div>
					</div>	
					

				
					@endforeach
					
				
					
			</div>
			<div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categorías</h4>


						@foreach($categorias as $cat)
						 <div class="tab1">
							 <ul class="place">								
								 <li class="sort">{{$cat->nombre}}</li>
								 <li class="by"><img src="{{asset("img/do.png")}}" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
							 <div class="single-bottom">	
							 
								@foreach($sub_categorias as $subcat)
									@if($cat->id == $subcat->categoria_id)
										<a href="../product/{{$subcat->id}}"><p>{{$subcat->nombre}}</p></a>
									@endif	
								@endforeach
							
						     </div>
					      </div>	

						@endforeach

									 
				 </section> 
			 </div>				 
	      </div>
	      <ol class="breadcrumb"></ol>
		</div>
</div>
@stop