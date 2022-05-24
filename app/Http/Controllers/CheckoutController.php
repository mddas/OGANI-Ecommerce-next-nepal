<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Shippingaddress;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        return view("home.checkout")->with(['carts'=>Cart::where('user_id',Auth::user()->id)->get()]);
    }

    public function insert(Request $req){
        //dd($req['district']);
        $billingAddress = Shippingaddress::updateOrCreate(
            ['number'=>$req['mobile_number']],
            [
            'user_id'=>Auth::user()->id,
            //'product_id'=>$req['product_id'],
            'email'=>$req['email'],
            'city_town_village'=>$req['town_city'],
            'state'=>$req['state'],
            'googleLocation'=>$req['location'],
            'name'=>$req['name'],
        ]);

        Session::flash('alert-class', 'alert-success'); 
        Session::flash('message', 'Successfully Payment!'); 

        return redirect("checkout");
    }
}
