@extends('layouts.app')
@section('content')
<div class="check">
 <h1>Order Elements : {{ count($data['cartProducts']) }}</h1>
    <?php $totalPrice = 0;  ?>
    @foreach ($data['cartProducts'] as $cartProduct)
    <div class="col-md-3 cart-total">
           
            <div class="price-details">
                <h3>Price Details</h3>
                <span>Total</span>
                <span class="total1">{{ $cartProduct->totalPrice }}</span>
                <span>Discount</span>
                <span class="total1">---</span>
                <span>Delivery Charges</span>
                <span class="total1"> ???</span>
                <div class="clearfix"></div>				 
            </div>	
            <ul class="total_price">
              <li class="last_price"> <h4>TOTAL</h4></li>
              <li class="last_price"><span>{{ $cartProduct->totalPrice }}</span></li>
              <div class="clearfix"> </div>
            </ul>

            
            <div class="clearfix"></div>         
           </div>
        <div class="col-md-9 cart-items">
        
            <div class="cart-header">
                <div class="cart-sec simpleCart_shelfItem">
                       @foreach ($data['images'] as $image)
                       @if ($image->productCode ==  $cartProduct->productCode)
                       <div class="cart-item cyc">
                            <img style="width:100%;height:150px" src="{{asset('image')}}/{{$image->idImage}}" class="img-responsive" alt="">
                       </div>    
                       @endif
                       @endforeach
                      <div class="cart-item-info">
                       @foreach ($data['products'] as $product)
                       @if ($product->productCode == $cartProduct->productCode)        
                       <h3><a href="#">{{ $product->productName }}</a><span>Model No: </span></h3>
                       @endif
                       @endforeach
                       <ul class="qty">
                            @if ($cartProduct->idSize != NULL)
                            
                            @foreach($data['sizes'] as $size)
                            @if ( $size->idSize == $cartProduct->idSize)
                            <li><p>Size : {{ $size->size  }}</p></li>
                            @endif
                            @endforeach
                           
                           @endif
                           
                           @if ($cartProduct->idColour != NULL)
                            @foreach($data['colours'] as $colour)
                            @if ($colour->idColour == $cartProduct->idColour)
                           <li><p>Colour : {{ $colour->colour  }}</p></li>
                           @endif
                           @endforeach
                           
                           @endif
                           <li><p>Quantity : {{ $cartProduct->Quantity }} </p></li>
                       </ul>
                      </div>
                      <div class="clearfix"></div>
                                           
                 </div>
            </div>
            
        </div>
        
       
           <div class="clearfix"> </div>
    @endforeach
        	 <div class=" cart-total">
           
            <div class="price-details">
                
                <div class="clearfix"></div>				 
            </div>	
            <ul class="total_price">
              <li class="last_price">--	</li>
              <li class="last_price"><h4>TOTAL : {{ $data['order']->totalPrice }}</h4></li>
              <div class="clearfix"> </div>
            </ul>
             
            
            <div class="clearfix"></div>         
           </div>
      <a class="continue" href="{{ asset('orders') }}/{{$data['order']->idOrder}}/treat">Treat The Order</a>
        
</div>
@endsection