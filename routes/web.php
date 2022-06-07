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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserdashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('login', function () {
//     return view('welcome');
// });
Route::get('userlogin',[UserController::class,'userLogin']);
Route::get('userregister',[UserController::class,'userRegister']);

Route::get('logout',[AuthenticatedSessionController::class,'destroy']);

Route::get('/admin', function () {
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
Route::get('getsubcategory_by_category_id' ,[SubcategoryController::class , 'getsubcategory']);

Route::get('subcategoryedit',[SubcategoryController::class,'eDit']);

//Search by Date
Route::get('searcharray',[SearchController::class,'index']);//Array
Route::get('searchproduct',[SearchController::class,'searchProduct']);//search by Product OR AJAX

//product
Route::get('products' ,[ProductController::class , 'index']);
Route::post('productinsert' ,[ProductController::class, 'insert']);
Route::get('productadd' ,[ProductController::class, 'productAdd']);
Route::get('productdelete', [ProductController::class , 'destroy']);

//cart
Route::get('insertcart',[CartController::class,'insert']);
Route::get('cartdelete' ,[CartController::class , 'destroy']);
Route::get('shoaping-cart' , [CartController::class,'showCart']);

//front-end
//index
Route::get('',[IndexController::class,'index']);//->middleware('auth');
Route::get('usingajax',[IndexController::class,'ajaxData']);//->middleware('auth');

//shoapdetail
Route::get('shoapdetail',[ShoapdetailController::class,'index']);

//checkout
Route::get('checkout' , [CheckoutController::class , 'index']);
Route::get('billingaddress', [CheckoutController::class , 'insert']);

//user Dashboard
Route::get('order',[OrderController::class, 'order']);
Route::get('track',[OrderController::class,'track']);

require __DIR__.'/auth.php';
