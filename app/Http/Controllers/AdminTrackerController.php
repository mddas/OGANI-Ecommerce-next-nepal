<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminTrackerController extends Controller
{
    public function index(){
        //dd(json_decode(Product::all()->first()['image']));
        $order = Order::all();//;->first();
        //return view("dashboard.order")->with(["alldata"=>$order]); 
        return view('dashboard/trace_user')->with(["alldata"=>$order]);   
    }
}
