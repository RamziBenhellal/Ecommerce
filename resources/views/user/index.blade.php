@extends('layouts.app')
@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data['users'] as $user)
   
    <tr>
     
     <th scope="row"> <a href="users/{{$user->id}}">{{$user->id}}</a></th>
      <td><a href="users/{{$user->id}}">{{$user->email}}</a></td>
      <td><a href="users/{{$user->id}}">{{$user->type}}</a></td>
      
    </tr>
    
 @endforeach   
  </tbody>
</table>
@endsection