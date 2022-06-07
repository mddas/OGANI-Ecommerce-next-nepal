@extends('layouts.masterhome')


@section('checkout')
@include('home.Breadcrumb-section')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="height:20px">
                    <h6 style="padding:1px 0 12px !important; margin-top: -25px;"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                    @if(Illuminate\Support\Facades\Session::has('message'))
<h3 class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</h3>
@endif

                </div>
                    @if ($errors->any())
    <div class="left alert alert-danger" style="margin-left: 20px">
        <ul>
            @foreach ($errors->all() as $error)
                <li style='float: left ; margin-left:25px'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
     @if(App\Http\Controllers\CartController::getTotalproductInCart()>0)
            <div class="checkout__form">
                <!----grid open----->
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <h4>Billing Details</h4>
                    </div>
                    <div class="col">
                        @if($shippingaddress)
                      <!----this is already added address----->

                      <ul class="list-group list-group-flush" style="color:red">
                            <label class="active card bg-white p-3">
                    <a href="javascript:void(0);" class="delete-address" data-src="http://sewa-digital.nextnepal.org/addresses/destroy/78"><i class="fa fa-trash fa-2x"></i></a>
                    <input type="radio" class="radio address_id" name="address_id" data-location="7" value="78" required="" style="margin-left: 300px;">
                     <span class="plan-details">
                    <span class="plan-type d-block">Name: <span class="right_bold">{{$shippingaddress['name']}}</span> </span>
                    <span class="plan-type d-block">City:<span class="right_bold">{{$shippingaddress['city_town_village']}}</span> </span>
                    <span class="plan-type d-block">Mobile Number:
                    <span class="right_bold">
                   {{$shippingaddress['number']}}
                    </span>
                    </span>
                    <span class="plan-type d-block">
                    Country:
                    <span class="right_bold">
                    Nepal
                    </span>
                    </span>
                    
                    </span>
                    </label>

                 </ul>
                     
                      @endif
                <!--already added address is closed---->  
                    </div>
                    <div class="col">
                      <!---column third---->
                    </div>
                  </div>
                </div>
                <!----grid closed---->
                
                     
                <!----form open------>
                <form action="/billingaddress" method="get">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                            </div>                            
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town_city">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Google Location<span>*</span></p>
                                <input type="text" name=location>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="mobile_number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            
                         
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach($carts as $cart)
                                    <li>{{$cart->product->name}}<span>{{$cart->product->price}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Shipping Fee <span>Rs.0</span></div>
                                <div class="checkout__order__total">Total <span>Rs.{{App\Http\Controllers\CartController::getTotalPriceOfUser()}}</span></div>
                    
                                <div class="checkout__input__checkbox">
                                    <div class="checkout__input__checkbox">
                                    <input type="radio" name="payment_type" value="COD">
                                    <label>COD</label>
                                    <input type="radio" name="payment_type" value="E-SEWA" style="margin-left:20px">
                                    <label>E-SEWA</label>                                   
                                </div>
                                </div>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!------form closed---->

            </div>
            @elseif(App\Http\Controllers\OrderController::isOrder()>0)
            <center><h3>Your {{App\Http\Controllers\OrderController::isOrder()}} Order on the Way</h3></center>
            @else
            <center><h3>Your Cart is now empty or you have not bought some order.Please visit and buy some product.</h3></center>
            @endif
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection