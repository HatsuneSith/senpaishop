@extends('layout')

@section('contenido')
<section class="container">
	<div class="product-model">
		<div class="col-xs-9 col-xs-offset-1">			
			<h2>Compras</h2>
	      	<br><br>
		    <ul class="list-group">
		    	@foreach($ventas as $venta)
		    		<li class="list-group-item" style="background:#eee;">
		    			<div class="container">
		    				<div class="col-md-6">
		    					Fecha : {{date("Y-m-d",strtotime($venta->created_at))}} &nbsp;&nbsp; Total : ${{number_format($venta->total)}}.00
		    				</div>
		    				<div class="col-md-3">
		    					
		    				</div>
		    			</div>
		    		</li>
		    		<li class="list-group-item">
		    		@foreach($venta->articulos_carrito as $ac)
		    			<div class="container">
		    				<div class="col-md-1">
		    					<a href="{{url('/single')}}/{{$ac->articulo->id}}"><img src="{{$ac->articulo->ruta_imagen()}}" width="80px" alt=""></a>
		    				</div>
		    				<div class="col-md-5">
		    					<p><a href="{{url('/single')}}/{{$ac->articulo->id}}">{{$ac->articulo->nombre}}</a></p>
		    					<p>${{number_format($ac->costo_individual)}}.00</p>
		    					<p>Cantidad : {{$ac->cantidad_articulo}}</p>
		    				</div>		    				
		    			</div>
		    			<br>
		    		@endforeach
		    		<form action="{{url('/pdf')}}" method="POST" target="_blank">
		    			<input type="hidden" name="_token" value="{{csrf_token() }}"> 
		    			<input type="hidden" name="venta_id" value="{{$venta->id}}">
		    			<input type="submit" class="btn btn-primary" value="Obtener PDF">
		    		</form>
		    		</li>
					<hr>
		    	@endforeach
		    </ul>
		</div>
	</div>
</section>	
@stop