@extends('layout')

@section('contenido')
<div class="product">
	 <div class="container">				
		 <div class="product-price1">
			 <div class="top-sing">
				  <div class="col-md-7 single-top">	
					 <div class="flexslider">					
						<div class="thumb-image"> <img src="../storage/app/articulos/{{$producto->id}}.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
						</div>					 					 

				 </div>	
			     <div class="col-md-5 single-top-in simpleCart_shelfItem">
					  <div class="single-para ">
						 <h4> {{$producto->nombre}}</h4>							
							<h5 class="item_price">$ {{$producto->precio}}</h5>							
							<p class="para">{{$producto->descripcion}}</p>
							
						    </div>

							<a href="#" class="add-cart item_add">ADD TO CART</a>							
					 </div>
				 </div>
				
			 </div>
	     </div>

	 </div>
</div>






<div class="container">
	<div class="col-xs-12 col-md-6">
	    <form action="{{url('/comsuc')}}" accept-charset="UTF-8" method="POST">
	        <input type="hidden" name="ArtID" value="{{$producto->id}}">
	        <input type="hidden" name="_token" value="{{csrf_token() }}">
	        <span>Este articulo se merece </span>
	        <img src="{{asset('img/banana2.png')}}" alt="" id="banana-1" class="">
	        <img src="{{asset('img/banana2.png')}}" alt="" id="banana-2" class="">
	        <img src="{{asset('img/banana2.png')}}" alt="" id="banana-3" class="">
	        <img src="{{asset('img/banana2.png')}}" alt="" id="banana-4" class="hidden">
	        <img src="{{asset('img/banana2.png')}}" alt="" id="banana-5" class="hidden">
	        <span> Bananas.</span>
	        <input id="banana-range" type="range" name="bananas" min="1" max="5" oninput="bananas(this.value)" onchange="bananas(this.value)">
	        <textarea class="form-control animated" cols="50" id="new-review" maxlength="250" name="comment" placeholder="Escribe un comentario..." rows="5"></textarea>
	        <div class="text-right">
	        	<input type="image" src="{{asset('img/babutton1.png')}}" alt="Submit" width="60" height="60">
	        </div>
	    </form>
	</div>
</div>






    <!-- RATINGS -->


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">
                            {{$promedio}}</h1>
                        <div>
                            Total: <span>{{$maxrate}} </span>
                            <img src="{{asset('img/banana.png')}}" alt="" id="" class="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="row rating-desc">
                            <div class="col-xs-3 col-md-3 text-right">
                                <img src="{{asset('img/banana.png')}}" alt="">5
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 5 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <img src="{{asset('img/banana.png')}}" alt="">4
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 4 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <img src="{{asset('img/banana.png')}}" alt="">3
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 3 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <img src="{{asset('img/banana.png')}}" alt="">2
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 2 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                <img src="{{asset('img/banana.png')}}" alt="">1
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">15%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end 1 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Comentarios Viejos -->

<div class="row">
	<div class="col-sm-7">
		<hr/>
		<div class="com_review-block">
			<div class="row">
				<div class="col-sm-3">
					<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
					<div class="com_review-block-name"><a href="#">nktailor</a></div>
					<div class="com_review-block-date">January 29, 2016<br/>1 day ago</div>
				</div>
				<div class="col-sm-9">
					<div class="com_review-block-rate">
						<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default com_btn-grey btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default com_btn-grey btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
					</div>
					<div class="com_review-block-title">this was nice in buy</div>
					<div class="com_review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
				</div>
				
			</div>
			<img src="{{asset('img/babutton2.png')}}" alt="" id="" class="">
			<img src="{{asset('img/babutton3.png')}}" alt="" id="" class="">
			<hr/>
			<!--Aqui se mueve el coso -->
			<div class="row">
				<div class="col-sm-3">
					<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
					<div class="com_review-block-name"><a href="#">nktailor</a></div>
					<div class="com_review-block-date">January 29, 2016<br/>1 day ago</div>
				</div>
				<div class="col-sm-9">
					<div class="com_review-block-rate">
						<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default com_btn-grey btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default com_btn-grey btn-xs" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
					</div>
					<div class="com_review-block-title">this was nice in buy</div>
					<div class="com_review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
				</div>
				
			</div>
			<img src="{{asset('img/babutton2.png')}}" alt="" id="" class="">
			<img src="{{asset('img/babutton3.png')}}" alt="" id="" class="">
			<hr/>
		</div>
		
	</div>
	
</div>

@stop