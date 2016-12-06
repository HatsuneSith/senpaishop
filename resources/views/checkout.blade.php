@extends('layout')

@section('contenido')
<div class="container">
	<div class="check-sec">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="{{url('/')}}">Agregar más al Carrito</a>
			<div class="price-details">
				<h3>Detalles de Compra</h3>
				<span>Total</span>
				<span class="total1 precio-inicial">{{$carrito->calcular_total()}}</span>				
				<span>Costos de Envío</span>
				<span class="total1">150</span>
				<div class="clearfix"></div>		 
			</div>	
			<ul class="total_price">
			   <li class="last_price"><h4>TOTAL</h4></li>	
			   <li class="last_price"><span class="precio-final">{{ $carrito->calcular_total() + 150 }}</span></li>			   
			</ul>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<a class="order" href="#">Comprar</a>
			<form action="{{url('/comprar')}}" method="POST" id="form-compra">
				<input type="hidden" name="_token" value="{{csrf_token() }}">  
				<input type="hidden" name="cantidades" value="">
			</form>			
		</div>
		<div class="col-md-9 cart-items">
			<h1>Mis Artículos ({{count($carrito->articulos)}})</h1>
			@foreach($carrito->articulos as $ac)
				<div class="cart-header">
					<div class="cart-sec simpleCart_shelfItem">			
						<div class="cart-item cyc">
							<img src="{{ $ac->articulo->ruta_imagen() }}" class="img-responsive" alt=""/>
						</div>						
					   <div class="cart-item-info">					   		
						    <h3>
						    	<a href="{{url('/single')}}/{{$ac->articulo->id}}">{{$ac->articulo->nombre}}</a>
						    </h3>
							<ul class="qty">								
								<li>Cantidad : <input type="number" class="{{$ac->articulo->id}}" name="cantidad" min="1" max="{{$ac->articulo->cantidad}}" value="{{$ac->cantidad_articulo}}"> </li>
							</ul>
							<div class="delivery">
								 <p>Precio : <span class="precio-{{$ac->articulo->id}}">{{$ac->costo_individual}}</span></p>
								 <div class="clearfix"></div>
							</div>
							<div>
								<form action="{{url('/eliminar-articulo-carrito')}}" method="POST">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="ac_id" value="{{$ac->id}}">									
									<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Eliminar del Carrito</button>
								</form>								
							</div>
					   </div>
					</div>
					<div class="clearfix"></div>					
				 </div>		 	
			 @endforeach
		</div>
		<div class="clearfix"> </div>
	</div>
</div>

@stop

@section('scripts')
	<script>	 	
		//alert($('input[name=cantidad]').val());
		$(":input").bind('keyup mouseup', function (obj) {			
		    var total = parseInt($('.total1').html());
		    var cantidad = obj.currentTarget.value;
		    var precio_articulo = parseInt($('.precio-'+obj.currentTarget.className).html());
		    var precio_inicial = parseInt($('.precio-inicial').html());
		    var precio_final = parseInt($('.precio-final').html());		    

		    var aumenta = obj.currentTarget.defaultValue < obj.currentTarget.value;
		    var cantidad_inicial = obj.currentTarget.defaultValue;

		    //Evita que cambie el precio si quiere bajar de 1 la cantidad
		    if(obj.currentTarget.defaultValue == 1 && !aumenta)
		    	return;

			obj.currentTarget.defaultValue = obj.currentTarget.value;

			if(aumenta) {				
				$('.precio-inicial').html(precio_inicial - (cantidad_inicial * precio_articulo) + (cantidad * precio_articulo));
				$('.precio-final').html(precio_final - (cantidad_inicial * precio_articulo) + (cantidad * precio_articulo));
			}
			else {				
				$('.precio-inicial').html(precio_inicial - (cantidad_inicial * precio_articulo) + (cantidad * precio_articulo));
				$('.precio-final').html(precio_final - (cantidad_inicial * precio_articulo) + (cantidad * precio_articulo));
			}
		});

		$('.order').click(function() {
			var articulos = [];
			$('input[name=cantidad]').each(function(i, obj) {
				articulos.push(parseInt(obj.value));
			});

			$('input[name=cantidades]').val(JSON.stringify(articulos));
			$('#form-compra').submit();			
		});
	</script>	
@stop