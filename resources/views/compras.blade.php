@extends('layout')

@section('contenido')
<section class="container">
	<div class="product-model">
		<div class="col-xs-12">
			<h2>Compras</h2>
      	<hr>
	     <table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Articulo</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ventas as $v)
					<tr>
						<td>{{$v->id}}</td>						
						<td><a href="{{url('single')}}/{{$v->articulo->id}}">{{$v->articulo->nombre}}</a></td>						
						<td>{{$v->created_at}}</td>						
					</tr>
				@endforeach
			</tbody>
		</table>		

		</div>
	</div>
</section>	
@stop