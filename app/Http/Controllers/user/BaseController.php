<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class BaseController extends Controller
{



    public function allpackage()
    {

        $packages = Package::where('is_active','0')->get();
        return view('user.category-package',compact('packages'));
    }
    public function packByCategory($slug)
    {
        $catid = Category::where('slug',$slug)->first();
        $packages = Package::where('is_active','0')->where('cat_id',$catid->id)->get();
        return view('user.category-package',compact('packages'));
    }

    public function threepackage()
    {
        $packages = Package::where('is_active','0')->where('home_view','1')->limit(3)->get();
        return view('user.home',compact('packages'));
    }
    public function packagedetails($slug)
    {
        $category = Category::all();
        $package = Package::where('is_active','0')->first();
        return view('user.package-details',compact('package','category'));
    }
}
