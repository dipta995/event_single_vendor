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
}
