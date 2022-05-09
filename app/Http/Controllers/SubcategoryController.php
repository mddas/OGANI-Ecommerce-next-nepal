<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show()
    {
        return view("dashboard.subcategory");
    }
}
