<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function orderview($slug)
    // {
    //     $category = Category::all();
    //     $package = Package::where('is_active','0')->first();
    //     return view('user.order-request',compact('package','category'));
    // }
    public function offerview($slug)
    {
        $category = Category::all();
        $package = Package::where('is_active','0')->first();
        return view('user.offer-request',compact('package','category'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'cat_id' =>'required',
        //     'pr_title' => 'required|max:150',
        //     'short_description' => 'required',
        //     'price' => 'required|numeric|min:1',
        //     'discount' =>'required|numeric|min:0',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        //  ]);
        $ordercount = Order::where('customer_id',$request->customer_id)->where('package_id',$request->package_id)->where('is_active',0)->count();
        if ($ordercount>0) {
            return back()->with('error','your last request pending please wait for confirm or cancell');
        }else{

        $addpack = Order::insert([
            'customer_id'=>$request->input('customer_id'),
            'package_id'=>$request->input('package_id'),
            'request_date'=>slugify($request->input('request_date')),
            'day'=>$request->input('day'),
            'package_price'=>$request->input('package_price'),
            'offer_price'=>$request->input('offer_price'),
            'message'=>$request->input('message')
        ]);

          if ($addpack) {

             return redirect('order-list')->with('success','inserted');
                       }

          else{
            return back()->with('error','Something Went wrong Try Again!');
          }
        }

    }
    public function pendingOrder(){
        $packages = Order::leftJoin('packages','packages.id','orders.package_id')->leftJoin('users','users.id','orders.customer_id')->where('orders.is_active','0')->get();
        return view('admin.pending-order',compact('packages'));

    }
    public function runningOrder(){
        $packages = Order::leftJoin('packages','packages.id','orders.package_id')->leftJoin('users','users.id','orders.customer_id')->where('orders.is_active','1')->get();
        return view('admin.running-order',compact('packages'));

    }
    public function approveOrder($id){
        $send =  Order::where('id', $id)->update([
            'is_active' => 1,
            ]);
        if ($send) {
            return redirect('/admin/pending-order')->with('success','inserted');
        }else {
            return back()->with('error','Something wrong');
        }


    }
    public function deleteOrder($id){
        $send = Order::destroy($id);
        if ($send) {
            return back()->with('success','Deleted');
        }else {
            return back()->with('error','Something wrong');
        }

    }
}
