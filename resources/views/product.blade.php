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
				<section class="sky-form">
					<div class="product_right">
						<h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categorías</h4>
						@foreach($categorias as $cat)						 	
							<ul class="place">								
								<li class="sort">{{$cat->nombre}}</li>
								<div class="clearfix"> </div>
						  	</ul>
							<div class="single-bottom">									 
								@foreach($sub_categorias as $subcat)
									@if($cat->id == $subcat->categoria_id)
										<a href="{{ url('product') }}/{{$subcat->id}}"><p>{{$subcat->nombre}}</p></a>
									@endif	
								@endforeach								
						    </div>					      	
						@endforeach	
					</div>
				</section>
				   
				<section  class="sky-form">
					<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Precio</h4>
					Mínimo: <span id="valor-menor">1</span> <input type="range" min="1" max="4000" id="rango-min">
					Máximo: <span id="valor-mayor">4000</span> <input type="range" min="1" max="4000" id="rango-max">
				</section>
				 
				<section  class="sky-form">
					<h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Ordenar</h4>
					<div class="row row1 scroll-pane">						 
						<div class="col col-4">
							<label class="radio"><input type="radio" name="filtro" id="asc_1" checked>Nombre (ascendente)</label>
							<label class="radio"><input type="radio" name="filtro" id="asc_2">Nombre (descendente)</label>
							<label class="radio"><input type="radio" name="filtro" id="asc_3">Precio (ascendente)</label>
							<label class="radio"><input type="radio" name="filtro" id="asc_4">Precio (descendente)</label>
						</div>
					</div>
				</section>

				<section class="sky-form">
					<form name="form_filtro" method="GET" action="{{url('/product')}}/{{$cat_id}}/filtro" onsubmit="filtrar();">						
						<div class="form-group">
							<input type="submit" value="Buscar">
							<input type="hidden" name="order">					
							<input type="hidden" name="by">					
							<input type="hidden" name="precio_min">						
							<input type="hidden" name="precio_max">						
						</div>
					</form>
				</section>
				   			 
			</div>				 
	    </div>
	    <ol class="breadcrumb"></ol>
	</div>
</div>
@stop

@section('scripts')
	<script>
		$('#rango-min').val(1);
		$('#rango-max').val(4000);

		$('#rango-min').on('input change', function() {
			var valor = $('#rango-min').val();
			valor = parseInt(valor);

			$('#valor-menor').text(valor);

			if(valor > $('#rango-max').val() ) {
				$('#rango-max').val(valor);
				$('#valor-mayor').text(valor);
			}

		});

		$('#rango-max').on('input change', function() {
			var valor = $('#rango-max').val();
			valor = parseInt(valor);

			$('#valor-mayor').text(valor);

			if(valor < $('#rango-min').val() ) {
				$('#rango-min').val(valor);
				$('#valor-menor').text(valor);
			}
		});

		function filtrar() {
			var order;
			var by;

			if(document.getElementById('asc_1').checked) {
				order = 'asc';
				by = 'nombre';
			}
			else if(document.getElementById('asc_2').checked) {
				order = 'desc';
				by = 'nombre';				
			}
			else if(document.getElementById('asc_3').checked) {
				order = 'asc';
				by = 'precio';
			}
			else {
				order = 'desc';
				by = 'precio';
			}
			
			document.form_filtro.order.value = order;			
			document.form_filtro.by.value = by;			
			document.form_filtro.precio_min.value = $('#rango-min').val();			
			document.form_filtro.precio_max.value = $('#rango-max').val();
		}
	</script>
@endsection