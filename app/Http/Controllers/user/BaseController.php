<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Review;
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
        $gallery = Gallery::all();
        $packages = Package::where('is_active','0')->where('home_view','1')->limit(3)->get();
        return view('user.home',compact('packages','gallery'));
    }
    public function packagedetails($slug)
    {

        $category = Category::all();
        $package = Package::where('slug',$slug)->first();
        $reviews = Review::where('package_id',$package->id)->where('is_active',0)->paginate(10);
        return view('user.package-details',compact('package','category','reviews'));
    }
}
