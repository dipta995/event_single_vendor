<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\democontrol\BaseController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//Customer Authontication Area
Route::group(['middleware'=>['auth:sanctum','verified','auth',]],function(){
Route::get('/', function () {
    return view('user.home');
});

});
//Admin Authontication Area
Route::group(['middleware'=>['auth:sanctum','verified','authadmin',]],function(){
// Route::get('/author', function () {
//     return view('admin.home');
// });

Route::resource('/author', BaseController::class);

//Category
Route::get('/admin/category', [CategoryController::class,'index']);
Route::post('add_new_cat', [CategoryController::class,'store']);
Route::get('/admin/category/delete/{id}', [CategoryController::class,'destroy']);
Route::get('/admin/category/{id}', [CategoryController::class,'edit']);
Route::post('update_cat/{id}', [CategoryController::class,'update']);

//Package
Route::get('/admin/package', [PackageController::class,'index']);
Route::get('/admin/package/create', [PackageController::class,'create']);
Route::post('add_new_pack', [PackageController::class,'store']);
Route::get('/admin/package/delete/{id}', [PackageController::class,'destroy']);
Route::get('/admin/package/{id}', [PackageController::class,'edit']);
Route::post('update_pack/{id}', [PackageController::class,'update']);

//
});
