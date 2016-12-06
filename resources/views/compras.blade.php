@extends('layout')

@section('contenido')
<section class="container">
	<div class="product-model">
		<div class="col-xs-9">
			<h2>Compras</h2>
	      	<hr>
		    <ul class="list-group">
		    	@foreach($ventas as $venta)
		    		<li class="list-group-item" style="background:#eee;">Fecha : {{date("Y-m-d",strtotime($venta->created_at))}} &nbsp;&nbsp; Total : ${{number_format($venta->total)}}.00</li>
		    		<li class="list-group-item">
		    		@foreach($venta->articulos_carrito as $ac)
		    			<div class="container">
		    				<div class="col-md-1">
		    					<a href="{{url('/single')}}/{{$ac->articulo->id}}"><img src="{{$ac->articulo->ruta_imagen()}}" width="80px" alt=""></a>
		    				</div>
		    				<div class="col-md-9">
		    					<p><a href="{{url('/single')}}/{{$ac->articulo->id}}">{{$ac->articulo->nombre}}</a></p>
		    					<p>${{number_format($ac->costo_individual)}}.00</p>
		    					<p>Cantidad : {{$ac->cantidad_articulo}}</p>
		    				</div>
		    			</div>
		    			<br>
		    		@endforeach
		    		</li>
					<hr>
		    	@endforeach
		    </ul>
		</div>
	</div>
</section>	
@stop