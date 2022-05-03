<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PermissonController;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard');

//User
Route::get('user',[UserController::class,'show']);
Route::get('insertuser',[UserController::class,'Insert']);
Route::get('insertrole',[RoleController::class,'Insert']);
Route::get('useredit',[UserController::class,'Edit']);
Route::get('userdelete',[UserController::class,'Delete']);
//Role
Route::get('role',[RoleController::class,'show']);
Route::get('roleedit',[RoleController::class,'Edit']);
Route::get('roledelete',[RoleController::class,'Delete']);
//Peermisson
Route::get('permisson',[PermissonController::class,'show']);
Route::get('insertpermisson',[PermissonController::class,'Insert']);
Route::get('permissonedit',[PermissonController::class,'Edit']);
Route::get('permissondelete',[PermissonController::class,'Delete']);
require __DIR__.'/auth.php';
