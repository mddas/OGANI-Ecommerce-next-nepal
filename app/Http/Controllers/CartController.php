<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
            
        return view("dashboard.cart")->with(["alldata"=>Cart::all()]); 
    }
    public function destroy(Request $req){
        $cartObj=Cart::find($req['id']);
        $cartObj->delete();
        return redirect("cart");
    }
}
