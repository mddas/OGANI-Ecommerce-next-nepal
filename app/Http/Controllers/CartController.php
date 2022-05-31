<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(){            
        return view("dashboard.cart")->with(["alldata"=>Cart::all()]); 
    }
    public function destroy(Request $req){
        if(Auth::check()==1){
            $cartObj=Cart::find($req['id']);
            $cartObj->delete();
            return redirect("cart");
        }
        else{
            $carts=$req->session()->pull("carts.".$req['id']);
            return $carts;
        }
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

            if(Auth::check()==1){
                 $cartAdd = Cart::updateOrCreate(
            ['product_id'=>$req['product_id']],
            [
            'user_id'=>Auth::user()->id,
            //'product_id'=>$req['product_id'],
            'quantity'=>$totalQuantity,
                 ]);
            }
            else{//adding products in session id
                //$user_id=$req->session()->get('user_id');
               
                 $product = Product::find($req['product_id']);

                 $carts=$req->session()->get('carts');

                 $carts[$req['product_id']]=array(//products1
                    'name'=>$product->name,
                    'product_id'=>$req['id'],
                    'image'=>$product->image,
                    'price'=>$product->price,
                    'quantity'=>1,
                 );
                 // in_array($product_id, $carts)
                 
                 $req->session()->put("carts",$carts);
                 return session()->get('carts');
            }
             //dd($req['quantity']);
            
            return redirect("/");
                //return $req;
            
    }
    public function showCart(){
        //return Cart::where('user_id',Auth::user()->id)->get();
        if(Auth::check()==1){
            $carts=Cart::where('user_id',Auth::user()->id)->get();
            return view('home.shoaping-cart')->with(['carts'=>$carts]);
        }
        else{
            //return "session testing";
            $carts=session()->get('carts');
            return view('home.shoaping-cart')->with(['carts'=>$carts]);
        }
        
    }
    public static function getTotalproductInCart(){
        if(Auth::check()==1){
                return Cart::where("user_id",Auth::user()->id)->count();
        }
        else{
            if (session()->exists('carts')) {
                return count(session()->get('carts'));
            }
            else{
                return 0;
            }
        }
    }
    public static function getTotalPriceOfUser(){
        if (Auth::check()==1) {
            $carts=Cart::where('user_id',Auth::user()->id)->get();
            $price=0;
            //return $carts;
            foreach($carts as $cart){
                $price =$price + $cart->product->price; 
             }
            return $price;
        }
        else{
            if(session()->exists('carts')){
                $carts=session()->get('carts');
                $price = 0;
                foreach($carts as $cart){
                    $price=$price + $cart['price'];
                 }
                return $price;
            }
            return 0;
        }
        
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
