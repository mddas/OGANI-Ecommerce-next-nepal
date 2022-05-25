<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $dateDetail=array();
        $catobj = Category::all();//->created_at;
        //$date=$catobj;//$catobj['created_at'];
        $final = [];
        foreach ($catobj as $fulldata ) {

            $date = date('Y-m-d',strtotime($fulldata['created_at']));

            $date = explode('-',$date);

            $year=$date[0];
            $month=$date[1];
            $day=$date[2];

            if(isset($final[$year])){
                if(isset($final[$year][$month])){
                    //return "set";
                    //$final[$year][$month]=array($day);
                    if(isset($final[$year][$month][$day])){

                    }
                    else{
                        $final[$year][$month][$day]=array("category Name"=>$fulldata['name']);
                    }
                }
                else{

                    //return "set md";
                    $final[$year][$month]=array($day=>array("category Name"=>$fulldata['name']));
                }
                

            }else{
             
                $final[$year]=array($month=>array($day=>array("category Name"=>$fulldata['name'])));            
        }
            
        
    }
    dd($final);
  }

  public function searchProduct(Request $req){
        
        $searchString=$req['name'];
        
        

        $result =Product::select("products.*"
                                 )
                        ->join("categories", "products.category_id", "=", "categories.id")
                        ->join("subcategories","subcategories.id","=","products.subcategory_id")
                        ->where("products.name",'LIKE',"%".$searchString."%")
                        ->orWhere("categories.name",'LIKE',"%".$searchString."%")
                        ->orWhere("subcategories.name",'LIKE',"%".$searchString."%")
                        ->get();
        return view('home.body')->with(['products'=>$result,'categories'=>Category::all(),'subcategories'=>Subcategory::all()]);
     }
}
/*
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID where Customers.CustomerName="QUICK-Stop";
*/ 
