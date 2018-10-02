@extends('layouts.app')
@section('content')
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							        <!-- FlexSlider -->
										<script src="{{asset('js/imagezoom.js')}}"></script>
										  <script defer="" src="{{asset('js/jquery.flexslider.js')}}"></script>
										<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen">

										<script>
										// Can also be used with $(document).ready()
										$(window).load(function() {
										  $('.flexslider').flexslider({
											animation: "slide",
											controlNav: "thumbnails"
										  });
										});
										</script>
									<!-- //FlexSlider-->

							  
							
						<div class="flex-viewport" style="overflow: hidden; position: relative;">
						<ul class="slides" style="width: 1200%; transition-duration: 0.6s; transform: translate3d(-864px, 0px, 0px);">
						@if(count($data['pimage'])>0)
						 @foreach($data['pimage'] as $pimage)
						<li data-thumb="{{asset('image')}}/{{ $pimage->idImage }}" class="clone" aria-hidden="true" style="width: 288px; float: left; display: block;">
								   <div class="thumb-image"> <img src="{{asset('image')}}/{{ $pimage->idImage }}" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
						</li>
						@endforeach
					   @endif
					   
					   @if(count($data['simage1'])>0)
						 @foreach($data['simage1'] as $pimage)
						<li data-thumb="{{asset('image')}}/{{ $pimage->idImage }}" class="" style="width: 288px; float: left; display: block;">
							<div class="thumb-image"> <img src="{{asset('image')}}/{{ $pimage->idImage }}" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
						</li>
					     @endforeach
					   @endif
					   
					   	@if(count($data['simage2'])>0)
						 @foreach($data['simage2'] as $pimage)
						<li data-thumb="{{asset('image')}}/{{ $pimage->idImage }}" style="width: 288px; float: left; display: block;" class="">
							<div class="thumb-image"> <img src="{{asset('image')}}/{{ $pimage->idImage }}" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
						</li>
						@endforeach
					   @endif
					   
					   @if(count($data['simage3'])>0)
						 @foreach($data['simage3'] as $pimage)
						<li data-thumb="{{asset('image')}}/{{ $pimage->idImage }}" style="width: 288px; float: left; display: block;" class="flex-active-slide">
						    <div class="thumb-image"> <img src="{{asset('image')}}/{{ $pimage->idImage }}" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
						</li>
						@endforeach
					   @endif
								
					</ul>
					</div>
					<ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
				  </div>
				  <div class="desc1 span_3_of_2">
					<h3>{{ $data['product']->productName}}</h3>
					<br>
					<span class="code">Product Code: {{ $data['product']->productCode}}</span>
						<div class="price">
							<span class="text">Price:</span>
							@if($data['product']->reduction ==0)
							<span class="price-new">{{ $data['product']->price }} DA</span> 
							@else
							<span class="price-new">{{ $data['product']->reduction }} DA</span><span class="price-old">{{ $data['product']->price }} DA</span> 
							@endif
							<span class="price-tax">Ex Tax: $90.00</span><br>
							<span class="points"><small>Price in reward points: {{$data['product']->price * 0.4 }}</small></span><br>
						</div>
					@if(count($data['psizes'])>0)	
					<div class="det_nav1">
						<h4>Size :</h4>
							<div class=" sky-form col col-4">
								<ul>
									 @foreach($data['psizes'] as $psize)
								     @foreach($data['sizes'] as $size)
								      @if($size->idSize == $psize->idSize)
									<li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{ $size->size }}</label></li>
									  @endif
									 @endforeach 
								    @endforeach
								</ul>
							</div>
					</div>
					@endif
					
					@if(count($data['pcolours'])>0)
					<div class="det_nav1">
						<h4>Colour :</h4>
							<div class=" sky-form col col-4">
								<ul>
									 @foreach($data['pcolours'] as $pcolour)
								     @foreach($data['colours'] as $colour)
								      @if($colour->idColour == $pcolour->idColour)
									<li><label class="checkbox"><input type="checkbox" name="checkbox"/><i></i><font class="glyphicon glyphicon-stop" color="{{ $colour->colour }}"></font></label></li>
									  @endif
									 @endforeach 
								    @endforeach
								</ul>
							</div>
					</div>
					@endif
					<div class="btn_form">
						<a href="{{asset('products')}}/{{ $data['product']->productCode }}/edit">Edit</a>
					</div>
					<div class="btn_form">
					{!! Form::open(['action' => ['ProductsController@destroy', $data['product']->productCode], 'method' => 'POST']) !!}
                    {{ Form::hidden('_method','DELETE') }}
                    {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                    </div>
					
			   	 </div>
          	    <div class="clearfix"></div>
          	   </div>
          	    <div class="single-bottom1">
					<h6>Details</h6>
					<p class="prod-desc">{{$data['product']->description }}</p>
				</div>
				<div class="single-bottom2">
					<h6>Related Products</h6>
						<div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="images/w8.jpg" class="img-responsive " alt="">
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							  <div class="clearfix"></div>
					      </div>
						 
						 <div class="clearfix"></div>
				     </div>
				     <div class="product">
						   <div class="product-desc">
								<div class="product-img">
		                           <img src="images/w10.jpg" class="img-responsive " alt="">
		                       </div>
		                       <div class="prod1-desc">
		                           <h5><a class="product_link" href="#">Excepteur sint</a></h5>
		                           <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>									
							   </div>
							   <div class="clearfix"></div>
					      </div>
						 
						 <div class="clearfix"></div>
				     </div>
		   	  </div>
	       </div>		
	  </div>

@endsection