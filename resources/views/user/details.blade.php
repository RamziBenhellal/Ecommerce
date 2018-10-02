@extends('layouts.app')
@section('content')
<table class="table" >
    <tr class="table-danger" >
      <th  >Email :</th>
      <td>{{$data['user']->email}}</td>
    </tr>
    <tr class="table-danger">
     <th  >Type : </th>
      <td>{{$data['user']->type}}</td>
    </tr>
 
  </tbody>
</table>
<a href="{{$data['user']->id}}/edit" class="btn btn-default">Edit</a>
@endsection