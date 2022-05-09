<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function show(){
        //return view("dashboard/user")->with(['roledata' => Role::all(),'data' => $data]);
        return view("dashboard.category")->with(['categories'=>Category::all()]);
    }
    public function insert(Request $request){
        $categoryName = $request['name'];
        if($request->file('image')){
            $file= $request->file('image');
            $fileName= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('categoryimage'), $fileName);
            $data['image']= $fileName;

            $Category = new Category;
            $Category->name = $categoryName;
            $Category->image=$fileName;
            $Category->save();
        }
        return redirect('category');
        ///$data->save();
        //return redirect()->route('images.view');
        /*

        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
   
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
   
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
   
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
   
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
   
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        */


        //return $categoryName."::".$req['file'];
        //return $file;//->getClientOriginalName();

    }
    public function deleteCategory(Request $req){
        $categoryObj=Category::find($req['id']);
        $categoryObj->delete();
        redirect ('category');
    }
}
