@extends('layouts.app') @section('content')
<div class="panel panel-widget forms-panel">
	<div class="progressbar-heading general-heading">
		<h4>{{ $data['titel'] }}  :</h4>
	</div>
	<div class="forms">
		<h3 class="title1"></h3>
		<div class="form-three widget-shadow">
			{!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST' , 'class' => 'form-horizontal','enctype'=>'multipart/form-data'  ]) !!}
    
				<div class="form-group">
				    {{ Form::label('productname','Product Name * :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('productname','',['class' => 'form-control1', 'placeholder' => 'Product Name']) }}
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('mark','Mark :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('mark','',['class' => 'form-control1', 'placeholder' => 'Mark']) }}
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('description','Description * :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::textarea('description','',['class' => 'form-control', 'placeholder' => 'Product Description']) }}
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('price','Price * :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::number('price','',['class' => 'form-control1', 'placeholder' => 'Price']) }}
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('reduction','Price Reduction  :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::number('reduction','',['class' => 'form-control1', 'placeholder' => 'Price Reduction']) }}
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('quantity','Stock Quantity *  :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::number('quantity','',['class' => 'form-control1', 'placeholder' => 'Stock Quantity']) }}
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('weight','Weight :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::number('weight','',['class' => 'form-control1', 'placeholder' => 'Weight']) }}
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('category','Category * :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 <select name="category" class="form-control1" >
					 @foreach($data['categories'] as $category)
					  <optgroup label="{{$category->name}}">
					  @foreach($data['subcategories'] as $subcategory)
					   @if($category->idCategory == $subcategory->idParent)
					 <option value="{{ $subcategory->idCategory }}">{{$subcategory->name}}</option>
					   @endif
					  @endforeach
					  </optgroup>
					 @endforeach
					 </select>
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('sizes','Product Sizes :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 @foreach($data['sizes'] as $size)
                    <div class="form-group"> 
					 <input class="col-sm-2"  type="checkbox" name="sizes[]" value="{{ $size->idSize }}"><label class="col-sm-2">{{ $size->size }}</label>
					 @if($size->size != 'none')
					 <div class="col-sm-8">
					{{ Form::number('q'.$size->idSize,'',[ 'placeholder' => 'Stock Quantity']) }}
					</div>
					@endif
					</div>
					 @endforeach
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('colours','Product Colours :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 @foreach($data['colours'] as $colour)
					<div class="form-group"> 
					 <input class="col-sm-2"  type="checkbox" name="colours[]" value="{{ $colour->idColour }}"><label class="col-sm-2">{{ $colour->colour }}</label>
					 @if($colour->colour != 'none')
					 <div class="col-sm-8">
					{{ Form::number('q'.$colour->idColour,'',[ 'placeholder' => 'Stock Quantity']) }}
					</div>
					@endif
					</div>
					 @endforeach
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('pimage','Principal Image * :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 {{ Form::file('pimage') }}
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('simage1','Secondary Image 1 :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 {{ Form::file('simage1') }}
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('simage2','Secondary Image 2 :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 {{ Form::file('simage2') }}
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('simage3','Secondary Image 3 :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 {{ Form::file('simage3') }}
					</div>
				</div>
				
				<div class="form-group">
				     <div class="col-sm-8">
				     {{ Form::submit('Next', ['class'=>'btn btn-primary']) }}
				     </div>
				</div>
				
				
		{!! Form::close() !!}		
		</div>
	</div>
</div>
@endsection
