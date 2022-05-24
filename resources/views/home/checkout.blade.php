@extends('layouts.masterhome')


@section('checkout')
@include('home.Breadcrumb-section')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>                
                @if(Illuminate\Support\Facades\Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</p>
@endif

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
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!------form closed---->

            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection