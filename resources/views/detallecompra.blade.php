<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		ul {
			list-style-type: none;
		}
		body {
			font-family: sans-serif;
		}
	</style>
</head>
<body>
	<img src="{{ asset('/img/logo.png') }}" height="80px">
	<h1>Detalle de Compra</h1>	
	<p>Fecha: {{date("l d F Y",strtotime($venta->created_at))}}</p>
	<p>Código de Compra: SENPAI-{{$venta->id}}</p>
	<ul>
		@foreach($venta->articulos_carrito as $ac)
			<li><em>{{$ac->articulo->nombre}}</em></li>
			<ul>
				<li>Cantidad: {{$ac->cantidad_articulo}}</li>
				@if($ac->cantidad_articulo > 1)
					<li>Costo Individual: ${{number_format($ac->costo_individual)}}.00</li>
				@endif
				<li>Total: ${{number_format($ac->costo_individual * $ac->cantidad_articulo)}}.00</li>
			</ul>
		@endforeach
		<br>
		<li>Costo de envío: $150.00</li>
	</ul>
	<h3>Total de la Compra: ${{number_format($venta->total)}}.00</h3>
</body>
</html>