@extends('layouts.app') 
@section('content')
<div class="panel panel-widget forms-panel">
	<div class="progressbar-heading general-heading">
		<h4>{{ $data['titel'] }}  :</h4>
	</div>
	<div class="forms">
		<h3 class="title1"></h3>
		<div class="form-three widget-shadow">
			{!! Form::open(['action' => ['SizesController@update',$data['size']->idSize], 'method' => 'POST' , 'class' => 'form-horizontal' ]) !!}
    
				<div class="form-group">
				    {{ Form::label('size','Size :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('size',$data['size']->size,['class' => 'form-control1', 'placeholder' => 'Size']) }}
						
					</div>
				</div>
				<div class="form-group">
				    {{ Form::label('sign','Size Sign :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('sign',$data['size']->sign,['class' => 'form-control1', 'placeholder' => 'Size Sign']) }}
					</div>
				</div>
			
				<div class="form-group">
				     <div class="col-sm-8">
				     {{ Form::hidden('_method','PUT') }}
				     {{ Form::submit('Edit', ['class'=>'btn btn-primary']) }}
				     </div>
				</div>
		{!! Form::close() !!}		
		</div>
	</div>
</div>
@endsection
