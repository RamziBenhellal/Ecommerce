@extends('layouts.app')
@section('content')
<div class="women_main">
 <h2 class="inner-tittle">{{$data['titel'] }}</h2>
 <div  class="rightPanel"><a href="{{ asset('/sizes/create')}}">
	<button type="button" class="btn btn-default">Add New Size</button></a>
</div>
				<hr/>
@if(count($data['sizes']) > 0)
 @foreach($data['sizes'] as $size)
	<div class="content-top-1">
		<div class="col-md-6 top-content">
			<h5>{{ $size->sign }}</h5>
			<label>{{ $size->size }}</label>
		</div>
		<div class="col-md-6 top-content1">
			<a href="sizes/{{ $size->idSize}}/edit" class="btn btn-warning">Edit</a>
		</div>
		</br>
		<div class="col-md-6 top-content1">
		{!! Form::open(['action' => ['SizesController@destroy', $size->idSize], 'method' => 'POST']) !!}
        {{ Form::hidden('_method','DELETE') }}
        {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
        {!! Form::close() !!}
        </div>
		<div class="clearfix"></div>
	</div>
@endforeach
<div class="btn-toolbar">
{{ $data['sizes']->links() }}
</div>	
@else
<p class="alert alert-danger">No Sizes ... </p>
@endif	
</div>
@endsection