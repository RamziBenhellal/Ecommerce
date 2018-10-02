@extends('layouts.app') @section('content')
<div class="panel panel-widget forms-panel">
	<div class="progressbar-heading general-heading">
		<h4>{{ $data['titel'] }}  :</h4>
	</div>
	<div class="forms">
		<h3 class="title1"></h3>
		<div class="form-three widget-shadow">
			{!! Form::open(['action' => 'ProductCategoriesController@store', 'method' => 'POST' , 'class' => 'form-horizontal' ]) !!}
    
				<div class="form-group">
				    {{ Form::label('categoryname','Category Name :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('categoryname','',['class' => 'form-control1', 'placeholder' => 'Category Name']) }}
						
					</div>
					<div class="col-sm-2">
						<p class="help-block">Your help text!</p>
					</div>
				</div>
				
				<div class="form-group">
					 {{ Form::label('parent','Parent Category :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 <select name="parent" class="form-control1" >
					 <option value="0">No parent</option>
					 @foreach($data['categories'] as $category)
					 <option value="{{ $category->idCategory }}">{{$category->name}}</option>
					 @endforeach
					 </select>
					</div>
				</div>
				<div class="form-group">
				     <div class="col-sm-8">
				     {{ Form::submit('Create', ['class'=>'btn btn-primary']) }}
				     </div>
				</div>
		{!! Form::close() !!}		
		</div>
	</div>
</div>
@endsection
