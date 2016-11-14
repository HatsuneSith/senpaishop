@extends('layout')

@section('contenido')

<ul class="nav nav-tabs">
  <li class=""><a href="#home" data-toggle="tab" aria-expanded="false">CSV Upload</a></li>
  <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Editar Item</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="home">
    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div>
  <div class="tab-pane fade" id="profile">
    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
  </div>
  
</div>
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



<div class="categorias-item-fix">
	<h2 class="categorias-item-fix-h2">Cambiar Categoria de Item</h1>
	<div class="row">
		<div class="col-lg-10">
			<form action="demo_form.asp" method="get">
			  <input list="browsers" name="browser">
			  <datalist id="browsers">
			    <option value="Internet Explorer">
			    <option value="Firefox">
			    <option value="Chrome">
			    <option value="Opera">
			    <option value="Safari">
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