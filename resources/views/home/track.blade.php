@extends("layouts.masterhome")
@section("order")
@foreach($orders as $order)
<div class="card-wrapper" style="margin-top: 20px;">
<div class="card">
  <div class="row">
    <div class="col-3">

      <img src="/product/{{$order['getProduct']->image}}" class="card-img-top" alt="..." style="width:40%;">
      <span style="color:red">{{$order->quantity}} Piece</span>
    </div>
  
  <div class="col-3">
    
    <h5 class="card-title"></h5>
    <p class="card-text"></p>
   <ul class="list-group list-group-flush">
      <h4>Product Detail</h4>
    <li class="list-group-item">{{$order['getProduct']->name}}</li>
    <li class="list-group-item">{{$order['getProduct']->description}}</li>
    <li class="list-group-item" style="color:red">Rs.{{$order['getProduct']->price*$order->quantity}}</li>
  </ul>
</div>
  <div class="col-3">
    <ul class="list-group list-group-flush">
      <h4>shipping address</h4>
    <li class="list-group-item">{{$order['getShippingAddress']->name}}</li>
    <li class="list-group-item">{{$order['getShippingAddress']->city_town_village}}</li>
    <li class="list-group-item">{{$order['getShippingAddress']->number}}</li>
  </ul>
  </div>
  <div class="col-3">
    <ul class="list-group list-group-flush">
    
    <h4 class="list-group-item" style="color:green;">{{$order['getShippingAddress']->status}}</h4>
    
  </ul>
</div>
  </div>
  </div>
</div>
@endforeach

@endsection