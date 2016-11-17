@extends('layout')

@if(Auth::guest() or Auth::user()->rol->nombre == 'Cliente')
	@section('contenido')
	<h1>Sácate alv</h1>
	@stop
@else

@section('contenido')
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
  <li><a href="#profile" data-toggle="tab">Profile</a></li>
  <li class="disabled"><a>Disabled</a></li>
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
      <li class="divider"></li>
      <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
    </ul>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div>
  <div class="tab-pane fade" id="profile">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  <div class="tab-pane fade" id="dropdown1">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
  <div class="tab-pane fade" id="dropdown2">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
</div>

<div class="csv-fix">
	<h2 class="csv-fix-h2">CSV Upload</h1>
	<form method="POST" action="/senpaishop/public/upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />



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
			        <button type="reset" class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
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
		    <span>Upload</span>
		    <input  id="uploadBtn" type="file" class="upload" name="avatar">
		</div>


		
		<button class="csv-fix-bt btn btn-primary" type="submit">Enviar</button>
	</form>
</div>


	<div class="contenedor categorias-item-fix" >
		<h2 class="categorias-item-fix-h2">Eliminar Categoria de Articulo</h1>
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
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
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