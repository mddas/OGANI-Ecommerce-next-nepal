<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function order(){
    $order = Order::where('user_id',Auth::user()->id)->get();//;->first();
    //dd($order[0]);
    //return dd(json_decode($order['products'])[0]);
     return view("dashboard.order")->with(["alldata"=>$order]); 
  }

  public static function isOrder(){
        return Order::where('user_id',Auth::user()->id)->get()->count();
    }
}
