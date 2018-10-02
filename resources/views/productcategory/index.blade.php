@extends('layouts.app')
@section('content')
<div class="women_main">
	<div class="tab-main">
		<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">{{$data['titel'] }}</h2>
				<div  class="rightPanel"><a href="{{ asset('/product_categories/create')}}">
				<button type="button" class="btn btn-default">Add New Category</button></a></div>
				<hr/>
				<div class="graph">
				@if(!empty($data['categories']))
					<nav>
						<ul>
						<?php $i=0;?>
						 @foreach($data['categories'] as $category)
						    @if($i == 0)
						  
							<li class="tab-current">
							<a href="#section-{{ $category->idCategory }}" class="icon-shop"><span> {{ $category->name }}</span></a>
							</li>
					     <?php $i++;?>
					        @else
					        <li>
					        <a href="#section-{{ $category->idCategory }}" class="icon-shop"><span>{{ $category->name }}</span></a>
					        </li>
					        @endif	
						@endforeach
							
						</ul>
					</nav>
					

				@else
				<div class="alert alert-danger">No Category ...</div>
				@endif
				@if(!empty($data['categories']))	
					<div class="content tab">
					@foreach($data['categories'] as $category)
						<section id="section-{{ $category->idCategory }}" class="content-current">
						<h2 class="inner-tittle">{{ $category->name }}</h2>
						<ul class="nav nav-tabs">
                          <li><a class="btn btn-warning" href="product_categories/{{ $category->idCategory }}/edit">Edit</a></li>
                          <li>
                          {!! Form::open(['action' => ['ProductCategoriesController@destroy', $category->idCategory], 'method' => 'POST' , 'class' => 'pull-right' ]) !!}
                          {{ Form::hidden('_method','DELETE') }}
                          {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
                          {!! Form::close() !!}
                          </li>
                        </ul>
                       <br/>
					@if(!empty($data['subcategories']))	
                         @foreach($data['subcategories'] as $sub)
                         
                            @if($sub->idParent == $category->idCategory)			
                             <div class="mediabox">
                                
								<a href="product_categories/{{ $sub->idCategory }}/edit">
								  <h3>{{$sub->name}}</h3>
								</a>
								<i class="fa fa-hand-holding-water"></i>
								<p></p>
							</div>
							@endif
						 @endforeach
						 	
					  @else
					  
					  @endif		
						</section>
						@endforeach
					</div>
					@endif
					<!-- /content -->
				</div>
				<!-- /tabs -->
			</div>
			<script src="{{ asset('js/cbpFWTabs.js') }}"></script>
			<script>
									new CBPFWTabs( document.getElementById( 'tabs' ) );
			</script>

			
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection