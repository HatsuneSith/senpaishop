<h1>Gracias por comprar en SenpaiShop!</h1>
<p>El detalle de tu compra es:</p>
<ul>
@foreach($venta->articulos_carrito as $ac)
	<li>{{$ac->articulo->nombre}} : ${{$ac->costo_individual}} ({{$ac->cantidad_articulo}})</li>
@endforeach
	<li>TOTAL : ${{$venta->total}}</li>
</ul>