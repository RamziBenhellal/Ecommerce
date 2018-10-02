@extends('layouts.app')
@section('content')
<div class="women_main">
	<!-- start content -->
   <div class="w_content">
		<div class="women">
			<a href="#"><h4>{{ $data['titel'] }} - <span>{{ count($data['products']) }} items &nbsp; &nbsp; </span> </h4></a>
		    <a href="{{asset('products/create')}}">
	           <button type="button" class="btn btn-default">Add New Product</button>
	        </a>

			<ul class="w_nav">
						<li>Sort : </li>
		     			<li><a class="active" href="#">popular</a></li> |
		     			<li><a href="#">new </a></li> |
		     			<li><a href="#">discount</a></li> |
		     			<li><a href="#">price: Low High </a></li> 
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>
		<!-- grids_of_4 -->
		
	@if(count($data['products'])>0)	
		@foreach($data['products'] as $product)
		 <div class="grid1_of_4">
				<div class="content_box"><a href="{{asset('/products')}}/{{ $product->productCode }}">
				    @foreach($data['images'] as $image)
				     @if($product->productCode == $image->productCode && $image->class == 'primary')
			   	   	 <img style="width:100%;height:150px" src="{{asset('image')}}/{{$image->idImage}}" class="img-responsive" alt="">
			   	   	 @endif
			   	   	@endforeach
				   	  </a>
				    <h4><a href="{{asset('/products')}}/{{ $product->productCode }}">{{ $product->productName}}</a></h4>
				     <p>{{ substr($product->description,0,20) }} ...</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>{{ $product->price }} DA</h6></span></div>
					
					 </div>
			   	</div>	
			</div>
		@endforeach
	@else
	<div class="alert alert-danger">
       <p>No product ...</p>
     </div>
	@endif	
		
		<!-- end grids_of_4 -->
		
		
	</div>
   <div class="clearfix"></div>
	<!-- end content -->
	</div>
@endsection