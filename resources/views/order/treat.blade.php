@extends('layouts.app')
@section('content')
<div class="faq">
	
		<h2 class="titel1">Order Processing</h2>
		<h3>Client Information :</h3>
            <ul>
				<li>- First Name : <b>{{ $data['client']->firstName }}</b></li>
				<li>- Last Name : <b>{{ $data['client']->lastName }}</b></li>
				<li>- Address : <b>{{ $data['client']->deliveryAddress }}</b></li>
				<li>- Mobile No : <b>{{ $data['client']->mobileNo }}</b></li>
				<li>- Geographic Location : 
				<div style="width: 380px; height: 250px;">
                            {!! Mapper::render() !!}
                </div>
				</li>
				
				<li></li>
			</ul>		
			<h3>Order </h3>
		<p>Nombre of Products : {{ count($data['cartProducts']) }}</p>
			<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Model No</th>
      <th scope="col">Size</th>
      <th scope="col">Colour</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
		 <tbody>	
			@foreach($data['cartProducts'] as $cartProduct)
				<tr>
				<td>  
				@foreach ($data['products'] as $product)
                @if ($product->productCode == $cartProduct->productCode)        
                       <b>{{ $product->productName }}</b>
                @endif
                @endforeach
                </td>
                <td> / </td>
                <td>
                  @if ($cartProduct->idSize != NULL)
                            @foreach($data['sizes'] as $size)
                            @if ( $size->idSize == $cartProduct->idSize)
                             <b>{{ $size->size  }}</b>
                            @endif
                            @endforeach
                           
                 @endif
                 </td>
                 <td>
                 @if ($cartProduct->idColour != NULL)
                 
                            @foreach($data['colours'] as $colour)
                            @if ($colour->idColour == $cartProduct->idColour)
                            
                           <b> {{ $colour->colour  }}</b>
                           @endif
                           @endforeach
                           
                 @endif
                 </td>
                 
          <td><b>{{ $cartProduct->Quantity }}</b></td>
          <td><b>{{ $cartProduct->totalPrice }}</b></td>
		</tr>
		
		
			@endforeach
			</tbody>
			
</table>
   <h3 ">Total :  <b>{{ $data['order']->totalPrice }}</b></h3>	
		
		<h3>Amount Transaction Status</h3>
		@if($data['transaction'] != NULL)
          <div class="form-three widget-shadow">
				<div data-example-id="form-validation-states-with-icons"> 
					 <div class="form-group has-success has-feedback">
					  <label class="alert-success control-label" > Money transaction was made with success <span class="glyphicon glyphicon-ok " aria-hidden="true"></span> </label>
					</div>
			   </div>
	      </div>
	   @else
	      <div class="form-three widget-shadow">
				<div data-example-id="form-group has-warning has-feedback"> 
					 <div class="form-group has-warning has-feedback">
					  <label class="alert-warning control-label" > Money transaction not made so far <span class="glyphicon glyphicon-warning-sign " aria-hidden="true"></span> </label>
					</div>
			   </div>
	      </div>		
	   @endif
			
		<h3>Phone Booking &amp; COD</h3>
		<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
		<h3>Refund-related</h3>
		<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
			<ul>
				<li>- Various versions have evolved over the years, sometimes by accident, sometimes on purpose</li>
				<li>- As opposed to using 'Content here, content here', making it look like readable English.</li>
				<li>- Sometimes by accident, sometimes on purpose Various versions have evolved over the years</li>
				<li>- Various versions have evolved over the years, sometimes by accident, sometimes on purpose</li>
				<li>- As opposed to using 'Content here, content here', making it look like readable English.</li>
				<li>- Sometimes by accident, sometimes on purpose Various versions have evolved over the years</li>
			</ul>
		<h3>Booking-related</h3>
		<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
		<h3>Ticket-related</h3>
		<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
			<ul>
				<li>- Various versions have evolved over the years, sometimes by accident, sometimes on purpose</li>
				<li>- As opposed to using 'Content here, content here', making it look like readable English.</li>
				<li>- Sometimes by accident, sometimes on purpose Various versions have evolved over the years</li>
				<li>- Various versions have evolved over the years, sometimes by accident, sometimes on purpose</li>
				<li>- As opposed to using 'Content here, content here', making it look like readable English.</li>
				<li>- Sometimes by accident, sometimes on purpose Various versions have evolved over the years</li>
			</ul>
		<h3>General</h3>
		<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
	
</div>

@endsection