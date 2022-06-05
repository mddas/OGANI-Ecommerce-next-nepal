<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        return view('dashboard/product')->with(["alldata"=>Product::all()]);   
    }

    public function ProductAdd(){
        return view("dashboard/product_add");
    }

    public function  insert(Request $req){
        //dd($req);
        $validated = $req->validate([
        'name' => 'required',
        'category' => 'required',
        'subcategory' => 'required',
        'brand'=>'required',
        'unit_price'=>'required',
        'price'=>'required',
        'image'=>'required',
        'discount_type'=>'required',
        'discount'=>'required',
        'tax_type'=>'required',
        'quantity'=>'required',
        'description'=>'required',
        'shipping_type'=>'required',
        'shipping_cost'=>'required',
            ]);

        if($req->file('image')){
                $file= $req->file('image');
                $fileName= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('product'), $fileName);
                $data['image']= $fileName;
            }
            else{
                $fileName="null";
            }
        $productAdd = Product::updateOrCreate(
            ['id' => $req['id']],
            [
            'name'=>$req['name'],
            'category_id'=>$req['category'],
            'subcategory_id'=>$req['subcategory'],
            'brand'=>$req['brand'],
            "unit_price"=>$req['unit_price'],
            "price"=>$req['price'],
            "image"=>$fileName,
            "discount_type"=>$req['discount_type'],
            "discount"=>$req['discount'],
            "tax_type"=>$req['tax_type'],
            "tax"=>$req['tax'],
            "quantity"=>$req['quantity'],                 
            'description'=>$req['description'],
            'shipping_type'=>$req['shipping_type'],
            'shipping_cost'=>$req['shipping_cost'],
            'show'=>$req['show'],
        ]);
        if($productAdd){
            Session::flash('insertMessage', 'Inserted successfully!');
            return redirect("products");
        }
    }

    public function destroy(Request $req){
        $ProductObj = Product::find($req['id']);
        $ProductObj->delete();
        return redirect('products');
    }

   
}
