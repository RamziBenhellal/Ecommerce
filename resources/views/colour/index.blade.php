@extends('layouts.app')
@section('content')
<div class="women_main">
 <h2 class="inner-tittle">{{$data['titel'] }}</h2>
 <div  class="rightPanel"><a href="colours/create">
	<button type="button" class="btn btn-default">Add New Colour</button></a>
</div>
				<hr/>
@if(count($data['colours']) > 0)
 @foreach($data['colours'] as $colour)
	<div class="content-top-1">
		<div class="col-md-6 top-content">
			<label>{{ $colour->colour }}</label>
			<font class="glyphicon glyphicon-stop" color="{{ $colour->colour }}"></font>    
		</div>
		<div class="col-md-6 top-content1">
			<a href="colours/{{ $colour->idColour}}/edit" class="btn btn-warning">Edit</a>
		</div>
		</br>
		<div class="col-md-6 top-content1">
		{!! Form::open(['action' => ['ColoursController@destroy', $colour->idColour], 'method' => 'POST']) !!}
        {{ Form::hidden('_method','DELETE') }}
        {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}
        </div>
                      
		<div class="clearfix"></div>
	</div>
@endforeach
<div class="btn-toolbar">
{{ $data['colours']->links() }}
</div>	
@else
<p class="alert alert-danger">No Colours ... </p>
@endif	
</div>
@endsection