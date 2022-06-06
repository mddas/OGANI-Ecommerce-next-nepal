<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function order(){
    //return Cart::where('user_id',Auth::user()->id)->where('payment',1)->first()->product;
     return view("dashboard.order")->with(["alldata"=>Cart::where('user_id',Auth::user()->id)->where('payment',1)->get()]); 
  }
}
