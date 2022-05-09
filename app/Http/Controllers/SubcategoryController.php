<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;



class SubcategoryController extends Controller
{
    public function show()
    {

        return view("dashboard.subcategory")->with(['subcategory'=>Subcategory::all(),'category'=>Category::all()]);
    }

    public function insert(Request $req){
        $subCategoryName=$req['name'];
        $categoryName=$req['category'];
        if($req->file('image')){
            $file= $req->file('image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('categoryimage'), $fileName);
            $data['image']= $fileName;

            $Subcategory = new Subcategory;
            $Subcategory->name = $subCategoryName;
            $Subcategory->image=$fileName;
            $Subcategory->save();
        }
        return redirect('subcategory');
    }

    public function deleteSubcategory(Request $req){
             $SubCategory = Subcategory::find($req['id']);
             $SubCategory->delete();
             return redirect('subcategory');
    }
}
