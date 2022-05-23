<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PermissonController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShoapdetailController;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
            
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard');

//User
Route::get('user',[UserController::class,'show']);
Route::get('insertuser',[UserController::class,'Insert']);
Route::get('useredit',[UserController::class,'Edit']);
Route::get('userdelete',[UserController::class,'Delete']);
Route::get('useredit',[UserController::class,'UserEdit']);
//Role
Route::get('role',[RoleController::class,'show']);
Route::get('roleedit',[RoleController::class,'edit']);
Route::get('insertrole',[RoleController::class,'Insert']);
Route::get('roledelete',[RoleController::class,'Delete']);
//Peermisson
Route::get('permisson',[PermissonController::class,'show']);
Route::get('insertpermisson',[PermissonController::class,'Insert']);
Route::get('permissonedit',[PermissonController::class,'Edit']);
Route::get('permissondelete',[PermissonController::class,'Delete']);

//category 
Route::get('category',[CategoryController::class,'show']);
Route::post('insertcategory',[CategoryController::class,'insert']);
Route::get('deletecategory',[CategoryController::class,'deleteCategory']);


//subcategory
Route::get('subcategory',[SubcategoryController::class,'show']);
Route::post('insertsubcategory',[SubcategoryController::class,'insert']);
Route::get('deletesubcategory',[SubcategoryController::class,'deleteSubcategory']);
Route::get('subcategoryedit',[SubcategoryController::class,'eDit']);

//Search by Date
Route::get('search',[SearchController::class,'index']);

//product
Route::get('products' ,[ProductController::class , 'index']);
Route::post('productadd' ,[ProductController::class, 'insert']);
Route::get('productdelete', [ProductController::class , 'destroy']);

//cart
Route::get('cart',[CartController::class, 'index']);
Route::get('insertcart',[CartController::class,'insert']);
Route::get('cartdelete' ,[CartController::class , 'destroy']);
Route::get('shoaping-cart' , [CartController::class,'showCart']);

//front-end
//index
//Route::get('',[CustomerController::class,'index']);
Route::get('',function(){
    return view("home.body")->with(['products'=>Product::all(),'categories'=>Category::all(),'subcategories'=>Subcategory::all()]);
})->middleware('auth');

//shoapdetail
Route::get('shoapdetail',[ShoapdetailController::class,'index']);

require __DIR__.'/auth.php';
