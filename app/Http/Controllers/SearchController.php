<?php

namespace App\Http\Controllers;
use App\Models\Category;

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
}

