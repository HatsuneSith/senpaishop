@extends('layout')

@section('contenido')


<div class="csv-fix">
	<h2 class="csv-fix-h2">CSV Upload</h1>
	<form method="POST" action="/senpaishop/public/upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<input id="uploadFile" placeholder="Choose File" disabled="disabled" />


		<div class="fileUpload btn btn-primary">
		    <span>Upload</span>
		    <input  id="uploadBtn" type="file" class="upload" name="avatar">
		</div>


		
		<button class="csv-fix-bt btn btn-primary" type="submit">Enviar</button>
	</form>
</div>

<div class="contenedor categorias-item-fix" >
	<h2 class="categorias-item-fix-h2">Eliminar Categoria de Articulo</h1>
	<div class="row">
			 @foreach ($articulos as $articulo)
			 	@foreach ($articulos->sub_categoria as $cat)
					  <label>{{$cat->nombre}}</label>		
				@endforeach    
			@endforeach
			<form  class="form-horizontal" action="/senpaishop/public/eliminar-subcategoria" method="get">
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
			        <button type="reset" class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			      </div>
		      </form>
		
	</div>
	<?php 
		if (isset($item_eslim)) {
		
	?>
	<form class="form-horizontal">
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

	    <div class="form-group">
	      <label for="select" class="col-lg-2 control-label">SubCategorias</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="select">
	        	@foreach ($item_elim->sub_categoria as $cat)
	        	<option>1</option>
								    
				@endforeach	

	        </select>
	    
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>
	<?php 
		} 
	?>
</div>

<div class="categorias-item-fix">
	<h2 class="categorias-item-fix-h2">Cambiar Categoria de Item</h1>
	<div class="row">
		<div class="col-lg-10">
			<form action="demo_form.asp" method="get">
			  <input list="browsers" name="browser">
			  <datalist id="browsers">
				  @foreach ($articulos as $articulo)
				    <option value="{{$articulo->nombre}}">				    
				   @endforeach
			  </datalist>
			  <input type="submit">
			</form>
		</div>

		<div class="col-lg-10">
			<div class="form-group">
			  <div class="input-group">
			    <input type="text" class="form-control"  id="disabledInput" disabled="" placeholder="Totoro">  
			  </div>
			</div>
		</div>

		<div class="col-lg-10">
			<div class="form-group">    
		      	<div class="col-lg-10">
			        <select class="form-control" id="select">
			          <option>1</option>
			          <option>2</option>
			          <option>3</option>
			          <option>4</option>
			          <option>5</option>
			        </select>
		      	</div>
				<button class="btn btn-danger" type="submit">Eliminar</button>
		    </div>
		</div>

		<div class="col-lg-10">
			<div class="form-group">
			  <div class="input-group">
			    <input type="text" class="form-control"  placeholder="Totoro">  
			  </div>
			</div>
		</div>	
	</div>


</div>
@stop