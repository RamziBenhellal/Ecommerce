@extends('layouts.app')
@section('content')
<table class="table table-btransactioned">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ID Client</th>
      <th scope="col">ID Order</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data['transactions'] as $transaction)

    <tr>
     <th scope="row"><a href="transaction/{{$transaction->id}}"> {{ $transaction->id }} </a></th>
     <td><a href="transaction/{{$transaction->id}}">{{ $transaction->idClient }}</a></td>
     <td><a href="transaction/{{$transaction->id}}">{{ $transaction->idOrder }}</a></td>
     <td><a href="transaction/{{$transaction->id}}">{{ $transaction->amount }}</a></td>
     <td><a href="transaction/{{$transaction->id}}">{{ $transaction->status }}</a></td>
    </tr>
 @endforeach   
  </tbody>
</table>
@endsection