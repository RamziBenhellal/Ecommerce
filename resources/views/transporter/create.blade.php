@extends('layouts.app') @section('content')
<div class="panel panel-widget forms-panel">
	<div class="progressbar-heading general-heading">
		<h4>{{ $data['titel'] }}  :</h4>
	</div>
	<div class="forms">
		<h3 class="title1"></h3>
		<div class="form-three widget-shadow">
			{!! Form::open(['action' => 'TransportersController@store', 'method' => 'POST' , 'class' => 'form-horizontal','enctype'=>'multipart/form-data' ]) !!}
    
				<div class="form-group">
				    {{ Form::label('name','Transporter Name * :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					{{ Form::text('name','',['class' => 'form-control1', 'placeholder' => 'Transporter Name']) }}
					</div>
				</div>
				<div class="form-group">
					 {{ Form::label('avatar','Transporter Avatar :',['class' => 'col-sm-2 control-label'])}}
					<div class="col-sm-8">
					 {{ Form::file('avatar') }}
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
