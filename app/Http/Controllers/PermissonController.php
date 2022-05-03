<?php

namespace App\Http\Controllers;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissonController extends Controller
{
    function show(){
        $allpermisson=Permission::all();
        return view("dashboard/permisson",["permissondata"=>$allpermisson]);
    }
    function Insert(Request $req){
        $permissonName=$req['Name'];
        $permission = Permission::create(['name' => $permissonName]);
        //$PERMISSON = new Permission; 
        //$PERMISSON->name = $permissonName;//$request->name; 
        //$PERMISSON->save();
        return redirect('permisson');
    }
    
    function Edit(Request $req){

    }

    function Delete(Request $req){
        $permissionDeleteObj = Permission::find($req['id']);
        $permissionDeleteObj->delete();
        return redirect('permisson');
    }
}
