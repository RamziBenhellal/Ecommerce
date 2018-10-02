@extends('layouts.app')
@section('content')
<div  class="rightPanel"><a href="{{ asset('/transporters/create')}}">
				<button type="button" class="btn btn-default">Add New Category</button></a></div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Transporter</th>
      <th scope="col">Avatar</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data['transporters'] as $transporter)
   
    <tr>
     
     <th scope="row"> <a href="transporters/{{$transporter->idTransporter}}">{{$transporter->idTransporter}}</a></th>
     <td><a href="transporters/{{$transporter->idTransporter}}">{{$transporter->transporterName}}</a></td>
     <td><img style="width:100px;height:50px" src="{{asset('transporterAvatar')}}/{{$transporter->idTransporter}}" class="img-responsive" alt="">
</td>
     
      
    </tr>
 @endforeach   
  </tbody>
</table>
@endsection