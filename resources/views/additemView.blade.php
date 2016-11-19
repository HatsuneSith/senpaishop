@extends('layout')

@if(Auth::guest() or Auth::user()->rol->nombre == 'Cliente')
	@section('contenido')
	<br><br><br>
	<div class="col-md-2 col-md-offset-2"></div>
	<h1>Acceso Restringido</h1>
	<br><br><br><br><br><br><br><br><br><br><br>
	@stop
@else

@section('contenido')

<div class="csv-fix">
	<h2 class="csv-fix-h2">CSV Upload</h1>
	<form method="POST" action="/senpaishop/public/upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />



		<div class="fileUpload btn btn-primary">
		    <span>Seleccionar CSV</span>
		    <input  id="uploadBtn" type="file" class="upload" name="avatar">
		</div>
		
		<button class="csv-fix-bt btn btn-primary" type="submit">Enviar</button>
	</form>
</div>


<div class="contenedor categorias-item-fix" >
	<h2 class="categorias-item-fix-h2">Eliminar Categoria de Articulo</h1>
	<div class="row">
	
			<form  class="form-horizontal" action="/senpaishop/public/buscar-articulo" method="get">
				<label  class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10 ">
				  <input  class="form-control" list="lista-articulos" name="lista-articulos">
				  <datalist id="lista-articulos">
					  @foreach ($articulos as $articulo)
					    <option value="{{$articulo->id}}: {{$articulo->nombre}}">				    
					   @endforeach
				  </datalist>
				  
				  </div>
				  <div class="col-lg-10 col-lg-offset-2">
			        <button type="reset" class="btn btn-default">Cancelar</button>
			        <button type="submit" class="btn btn-primary">Seleccionar</button>
			      </div>
		      </form>
		
	</div>
	<?php 
		if (isset($item_elim)) {
		
	?>
	<form class="form-horizontal" >
	  <fieldset>
	    <div class="form-group">
	      <label  class="col-lg-2 control-label">Nombre</label>
	      <label  class="col-lg-10">{{$item_elim->nombre}}</label>
	    </div>
	 
	    <div class="form-group">
	      <label for="textArea" class="col-lg-2 control-label">Descripcion</label>
	      <div class="col-lg-10">
			<span class="help-block">{{$item_elim->descripcion}}</span>
	      </div>
	    </div>


	    	
	  </fieldset>
	</form>
		<div class="row">
			<form  class="form-horizontal" action="senpaishop/public/eliminar-subcategoria/" method="get">
				<label  class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10 ">
				  <input  class="form-control" list="lista-categorias" name="lista-categorias">
				  <datalist id="lista-categorias">
				  @foreach ($item_elim->subcategorias as $cat)
	        		<option  value=" {{$item_elim->id}}:{{$cat->id}}" >{{$cat->nombre}}</option>
								    
				  @endforeach	
				  </datalist>

				  </div>
				  <div class="col-lg-10 col-lg-offset-2">
			        <button type="reset" class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			      </div>
		      </form>
		</div>
	<?php 
		} 
	?>
</div>


<div class="csv-fix">
	<h2 class="csv-fix-h2">Agregar un Articulo</h1>
	<form method="POST" action="/senpaishop/public/agregar-articulo-individual" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

			<p>Nombre:</p>
			<input type="text"  class="form-control"  name="nombre">
			<br>
			<p>Cantidad:</p>
			<input type="text" class="form-control" name="cantidad">
			<p>Precio:</p>
			<input type="text" class="form-control" name="precio">
			<p>Descripcion:</p>
			<input type="text" class="form-control" name="descripcion">
			<p>SubCategorias:</p>
			<input type="text" class="form-control" name="subc">
			<p>Nombre Imagen:</p>
			<input type="text" class="form-control" name="imgn">
			<br>


		<div class="fileUpload btn btn-primary">
		    <span>Imagen</span>
		    <input  id="uploadBtn" type="file" class="upload" name="avatar">
		</div>


		
		<button class="csv-fix-bt btn btn-primary" type="submit">Enviar</button>
	</form>
</div>


	<div class="contenedor categorias-item-fix" >
		<h2 class="categorias-item-fix-h2">Agregar Categoria a un Articulo</h1>
		<div class="row">
		
				<form  class="form-horizontal" action="/senpaishop/public/buscar-articulo2" method="get">
					<label  class="col-lg-2 control-label">Nombre</label>
						<div class="col-lg-10 ">
					  <input  class="form-control" list="lista-articulos" name="lista-articulos">
					  <datalist id="lista-articulos">
						  @foreach ($articulos as $articulo)
						    <option value="{{$articulo->id}}: {{$articulo->nombre}}">				    
						   @endforeach
					  </datalist>

					  </div>
					  <div class="col-lg-10 col-lg-offset-2">
				        <button type="reset" class="btn btn-default">Cancelar</button>
				        <button type="submit" class="btn btn-primary">Seleccionar</button>
				      </div>
			      </form>
			
		</div>
		<?php 
			if (isset($item_agre)) {
			
		?>
		<form class="form-horizontal" >
		  <fieldset>
		    <div class="form-group">
		      <label  class="col-lg-2 control-label">Nombre</label>
		      <label  class="col-lg-10">{{$item_agre->nombre}}</label>
		    </div>
		 
		    <div class="form-group">
		      <label for="textArea" class="col-lg-2 control-label">Descripcion</label>
		      <div class="col-lg-10">
				<span class="help-block">{{$item_agre->descripcion}}</span>
		      </div>
		    </div>


		    	
		  </fieldset>
		</form>
			<div class="row">
				<form  class="form-horizontal" action="senpaishop/public/agregar-subcategoria/" method="get">
					<div class="col-lg-10">
						<p>Articulo ID:</p>
						<input type="text" class="form-control" name="artid" value="{{$item_agre->id}}">
						<p>SubCategorias:</p>
						<input type="text" class="form-control" name="subc">					
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				    </div>
			      </form>
			</div>
		<?php 
			} 
		?>
	</div>
@stop
@endif