<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        //dd(Product::all());
        return view('dashboard/product')->with(["alldata"=>Product::all()]);   
    }

    public function  insert(Request $req){
        //dd($req['name']);
        $validated = $req->validate([
        'name' => 'required',
        'price'=> 'required',
        'category' => 'required',
        'subcategory' => 'required',
            ]);
        
        $productAdd = Product::updateOrCreate(
            ['id' => $req['id']],
            [
            'name'=>$req['name'],
            'price'=>$req['price'],
            'category_id'=>$req['category'],
            'subcategory_id'=>$req['subcategory'],                 
            'description'=>$req['description'],
            'show'=>$req['show'],
        ]);
        if($productAdd){
            Session::flash('insertMessage', 'Inserted successfully!');
            return redirect("product");
        }
    }

    public function destroy(Request $req){
        $ProductObj = Product::find($req['id']);
        $ProductObj->delete();
        return redirect('product');
    }
}
