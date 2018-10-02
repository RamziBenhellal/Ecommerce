@extends('layouts.app') @section('content')
<div class="panel panel-widget forms-panel">
	<div class="progressbar-heading general-heading">
		<h4>{{ $data['titel'] }}  :</h4>
	</div>
	<div class="forms">
		<h3 class="title1"></h3>
		<div class="form-three widget-shadow">
			{!! Form::open(['action' => 'ColoursController@store', 'method' => 'POST' , 'class' => 'form-horizontal' ]) !!}
    
				<div class="form-group">
				    {{ Form::label('colour','Colour :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('colour','',['class' => 'form-control1', 'placeholder' => 'Colour']) }}
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
