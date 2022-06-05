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
        if(Auth::check()==1){
            if(Shippingaddress::where('user_id',Auth::user()->id)){
                $shippingaddress = Shippingaddress::where('user_id',Auth::user()->id)->first();
                return view("home.checkout")->with(['carts'=>Cart::where('user_id',Auth::user()->id)->get(),'shippingaddress'=>$shippingaddress]);
            }
            else{
              return view("home.checkout")->with(['carts'=>Cart::where('user_id',Auth::user()->id)->get()]);
          }
        }
        else{
            return redirect('/userlogin');
        }
    }

    public function insert(Request $req){
        //dd($req['district']);
          $validated = $req->validate([
        'mobile_number' => 'required',
        'email' => 'required',
        'town_city' => 'required',
        'state'=>'required',
        'location'=>'required',
        'name'=>'required',
            ]);
        $billingAddress = Shippingaddress::updateOrCreate(
            ['number'=>$req['mobile_number'],
             'user_id'=>Auth::user()->id,
            ],
            [
            'email'=>$req['email'],
            'city_town_village'=>$req['town_city'],
            'state'=>$req['state'],
            'googleLocation'=>$req['location'],
            'name'=>$req['name'],
        ]);
        if($billingAddress){
            
            //return $cart;
        $cart =  Cart::where('user_id', Auth::user()->id)->update(['payment'=>1]); 
            }

        Session::flash('alert-class', 'alert-success'); 
        Session::flash('message', 'Congratulation!!! Your order is on the way !'); 

        return redirect("checkout");
    }
}
