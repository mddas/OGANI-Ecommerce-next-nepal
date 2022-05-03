<?php

namespace App\Http\Controllers;
//use App\Models\Role;
//use App\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    function show(){
        $allrole=Role::all();
        //$UserName=$alldata->input('Name');
        //return $req['Name'];
        return view("dashboard/role")->with(['allrole'=>$allrole,  'permissions' => Permission::all()]);
        //return view("dashboard/role",['allrole'=>$allrole]);
    }
    function Insert(Request $req){
        $rolename=$req['Name'];
        $permissonid=$req['permissonlist'];

        $permission=Permission::find($permissonid[0]);
        $role=Role::create(['name' => $rolename]);
        $role->givePermissionTo($permission);
        //foreach($permisson as $pd){//
            //$role->givePermissionTo($pd);
          //  return $pd;
        //}
        //$ROLE = new Role; 
        //$ROLE->name = $rolename;//$request->name; 
        //$ROLE->save();
        return redirect('role');
    }
    function Edit(Request $req){

    }

    function Delete(Request $req){
        $RoleObj = Role::find($req['id']);
        $RoleObj->delete();
        return redirect('role');
    }
}
