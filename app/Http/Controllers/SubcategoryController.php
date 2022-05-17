<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Categoryhassubcategory;



class SubcategoryController extends Controller
{
    public function show()
    {
        //dd(Category::with('subCategory')->get());
        //return cateGorymd();
        //return Subcategory::cateGory;
        return view("dashboard.subcategory")->with(['subcategory'=>Subcategory::all(),'category'=>Category::all()]);
    }

    public function insert(Request $req){
        $subCategoryName=$req['name'];
        $categoryID=$req['category'];        

       
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
        //insert category id and subcategory to the table Categoryhassubcategory.
        $categoryHasSub=new Categoryhassubcategory;
        $categoryHasSub->category_id=$categoryID;
        $categoryHasSub->subcategory_id=$Subcategory->id;
        $categoryHasSub->save();

        return redirect('subcategory');
    }

    public function deleteSubcategory(Request $req){
             $SubCategory = Subcategory::find($req['id']);
             $SubCategory->delete();
             return redirect('subcategory');
    }
}
