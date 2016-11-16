
@extends('layout')

@section('contenido')



<section class="container">
	<div class="product-model">
		<div class="col-xs-12">
			<h2>Inventario</h2>
      	<hr>
	     <table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				@foreach($productos as $p)
					<tr>
						<td>{{$p->id}}</td>
						<td>{{$p->nombre}}</td>
						<td>{{$p->cantidad}}</td>
						<td>{{$p->precio}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{!! $productos->render() !!}

		</div>
	</div>
</section>	
@stop