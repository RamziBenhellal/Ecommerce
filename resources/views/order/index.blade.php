@extends('layouts.app')
@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Order Date</th>
      <th scope="col">Product Count</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data['orders'] as $order)
   
    <tr>
     <th scope="row"> <a href="orders/{{$order->idOrder}}">{{$order->idOrder}}</a></th>
     <td><a href="orders/{{$order->idOrder}}">{{$order->created_at}}</a></td>
     <td><a href="orders/{{$order->idOrder}}">{{$order->nbElement}}</a></td>
     <td><a href="orders/{{$order->idOrder}}">{{$order->totalPrice}}</a></td>
     <td><a href="orders/{{$order->idOrder}}">{{$order->status}}</a></td>
    </tr>
 @endforeach   
  </tbody>
</table>
@endsection