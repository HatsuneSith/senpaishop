<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		ul, li > ul{
			list-style-type: none;
		}
	</style>
</head>
<body>
	<h1>Detalle de Compra</h1>	
	<p>Fecha: {{date("l d F Y",strtotime($venta->created_at))}}</p>
	<ul>
		@foreach($venta->articulos_carrito as $ac)
			<li><em>{{$ac->articulo->nombre}}</em></li>
			<ul>
				<li>Cantidad: {{$ac->cantidad_articulo}}</li>
				<li>Costo Individual: ${{number_format($ac->costo_individual)}}.00</li>
				<li>Total: ${{number_format($ac->costo_individual * $ac->cantidad_articulo)}}.00</li>
			</ul>
		@endforeach
		<br>
		<li>Costo de envío: $150.00</li>
	</ul>
	<h3>Total de la Compra: ${{number_format($venta->total)}}.00</h3>
</body>
</html>