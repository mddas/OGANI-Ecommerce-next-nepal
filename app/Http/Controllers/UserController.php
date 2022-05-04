<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function show(){
      $data=User::all();
      return view("dashboard/user")->with(['roledata' => Role::all(),  'data' => $data]);
      //return view("dashboard/user",['data'=>$data,'roledata'=>Role::all()]);
    }

    function Insert(Request $req){

        $name=$req['Name']; 
        $email=$req['email'];     
        $role=$req['role'];
        $password=$req['password'];



        
        //auth()->User()->assignRole($role);

        $USER = new User; 
        $USER->name = $name;//$request->name; 
        $USER->email=$email;
        $USER->password=Hash::make($password);
        $USER->save();
        $USER->assignRole($role);

        

        return redirect('user');   
        
    }
    function Edit(Request $req){

    }

    function Delete(Request $req){
        $UserObj = User::find($req['id']);
        $UserObj->delete();
        return redirect('user');
    }
}
