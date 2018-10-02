@extends('layouts.app') @section('content')

<div class="women_main">
	<div class="tab-main">
		<!--/tabs-inner-->
		<div class="tab-inner">
			<div id="tabs" class="tabs">
				<h2 class="inner-tittle">{{$data['titel'] }}</h2>
				<hr />
				<div class="graph">
				

					<div class="mediabox">
						<img style="width: 250px; height: 150px"
							src="{{asset('transporterAvatar')}}/{{$data['transporter']->idTransporter}}"
							class="img-responsive" alt="">
						<h3>{{$data['transporter']->transporterName}}</h3>
						<a class="btn btn-warning" href="{{asset('transporters')}}/{{ $data['transporter']->idTransporter }}/edit">Edit</a>
                          
                          {!! Form::open(['action' => ['TransportersController@destroy', $data['transporter']->idTransporter], 'method' => 'POST' , 'class' => 'pull-right' ]) !!}
                          {{ Form::hidden('_method','DELETE') }}
                          {{ Form::submit('Delete',['class' => 'btn btn-danger']) }}
                          {!! Form::close() !!}
                         
					</div>

					<section></section>
				</div>
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
<div></div>
@endsection
