<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\user\BaseController;
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

//Customer UN Authontication Area
Route::get('/', [BaseController::class,'threepackage']);
Route::get('/packages', [BaseController::class,'allpackage']);
Route::get('/category/{slug}', [BaseController::class,'packByCategory']);
Route::get('package-details/{slug}', [BaseController::class,'packagedetails']);

Route::group(['middleware'=>['auth:sanctum','auth',]],function(){
//Customer Authontication Area
Route::get('offer/{slug}', [OrderController::class,'offerview']);
Route::get('order-list', [OrderController::class,'customerOrderhistory']);
// Route::get('order/{slug}', [OrderController::class,'orderview']);
Route::post('send-order-offer', [OrderController::class,'store']);
Route::get('/gallery', [GalleryController::class,'index']);
Route::get('/contact-us', function () {
    return view('user.contact');
});

});
//Admin Authontication Area
Route::group(['middleware'=>['auth:sanctum','authadmin',]],function(){
Route::get('/author', function () {
    return view('admin.home');
});

// Route::resource('/author', BaseController::class);

//Category
Route::get('/admin/category', [CategoryController::class,'index']);
Route::post('add_new_cat', [CategoryController::class,'store']);
Route::get('/admin/category/delete/{id}', [CategoryController::class,'destroy']);
Route::get('/admin/category/{id}', [CategoryController::class,'edit']);
Route::post('update_cat/{id}', [CategoryController::class,'update']);

//Package
Route::get('/admin/package', [PackageController::class,'index']);
Route::get('/admin/package/create', [PackageController::class,'create']);
Route::post('add_new_product', [PackageController::class,'store']);
Route::get('/admin/package/delete/{id}', [PackageController::class,'destroy']);
Route::get('/admin/package/{id}', [PackageController::class,'edit']);
Route::post('update_pack/{id}', [PackageController::class,'update']);

//Image For Package
Route::get('/admin/multipleimage', [PackageController::class,'imageindex']);
Route::post('add_multiple_image', [PackageController::class,'multipleimage']);
Route::get('/admin/multipleimage/delete/{id}', [PackageController::class,'delimage']);

//Order Packages
Route::get('/admin/pending-order', [OrderController::class,'pendingOrder']);
Route::get('/admin/running-order', [OrderController::class,'runningOrder']);
Route::get('/admin/end-order', [OrderController::class,'endAllOrder']);
Route::get('/admin/order/approve/{id}', [OrderController::class,'approveOrder']);
Route::get('/admin/order/end/{id}', [OrderController::class,'endOrder']);
Route::get('/admin/order/delete/{id}', [OrderController::class,'deleteOrder']);

//Gallery Packages
Route::get('/admin/gallery', [GalleryController::class,'index']);
Route::post('/admin/add_new_gallery', [GalleryController::class,'store']);
Route::get('/admin/gallery/delete/{id}', [GalleryController::class,'destroy']);

//Employee Packages
Route::get('/admin/employee', [EmployeeController::class,'index']);
Route::get('/admin/employee/create', [EmployeeController::class,'create']);
Route::post('/admin/employee_create', [EmployeeController::class,'store']);
Route::post('/admin/employee_update/{id}', [EmployeeController::class,'update']);
Route::get('/admin/employee/{id}', [EmployeeController::class,'edit']);
Route::get('/admin/employee/delete/{id}', [EmployeeController::class,'destroy']);
Route::get('/admin/employee/pay/{id}', [EmployeeController::class,'pay']);
Route::post('/admin/employee_payment/{id}', [EmployeeController::class,'payment']);

//Customer manage
Route::get('admin/customer', [CustomerController::class,'index']);
Route::get('admin/customer/delete/{id}', [CustomerController::class,'delete']);


//add review
Route::get('admin/reviews', [ReviewController::class,'index']);
Route::post('send/comment', [ReviewController::class,'sendReview']);
Route::post('send/replay', [ReviewController::class,'sendreplay']);


});
