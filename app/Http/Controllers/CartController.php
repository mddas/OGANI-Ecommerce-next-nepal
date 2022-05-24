<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Mocartsdels\Product;
use Illuminate\Support\Facades\Auth;

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
    public function insert(Request $req){
            if($req['quantity']==null){
                $reqquantity=1;
            }
            else{
                $reqquantity=$req['quantity'];
            }
            if(Cart::where("product_id",$req['product_id'])->first()!=null){
                 $quantity=Cart::where("product_id",$req['product_id'])->first()->quantity;
                }
            else{
                $quantity=0;
            }
            if($req['update']=="add"){
                $totalQuantity=$reqquantity+$quantity;
            }
            else{
                $totalQuantity=$reqquantity;
            }
             //dd($req['quantity']);
             $cartAdd = Cart::updateOrCreate(
            ['product_id'=>$req['product_id']],
            [
            'user_id'=>Auth::user()->id,
            //'product_id'=>$req['product_id'],
            'quantity'=>$totalQuantity,
        ]);
        return redirect("/");
            
    }
    public function showCart(){
        //return Cart::where('user_id',Auth::user()->id)->get();
        return view('home.shoaping-cart')->with(['carts'=>Cart::where('user_id',Auth::user()->id)->get()]);
    }
    public static function getTotalproductInCart($user_id){
        return Cart::where("user_id",$user_id)->count();
    }
    public static function getTotalPriceOfUser(){
        $carts=Cart::where('user_id',Auth::user()->id)->get();
        $price=0;
        //return $carts;
        foreach($carts as $cart){
          $price =$price + $cart->product->price; 
        }
        return $price;
    }
    public static function getTotalQuantityOfProduct($product_id){
        
        if(Cart::where('product_id',$product_id)->first()!=null){
                return Cart::where('product_id',$product_id)->first()->quantity;
            }
        else{
            return 0;
        }
    }
}
