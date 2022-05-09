<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function show(){
        return view("dashboard.category");
    }
}
