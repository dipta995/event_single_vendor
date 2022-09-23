<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::leftJoin('categories','categories.id','packages.cat_id')->select('packages.*','categories.*','packages.id as id')->where('is_active','0')->get();
        return view('admin.package',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::all();
        return view('admin.package_create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'cat_id' =>'required',
            'pr_title' => 'required|max:150',
            'short_description' => 'required',
            'price' => 'required|numeric|min:1',
            'discount' =>'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
         ]);
         if ($request->file("image") !="") {
             $file=$request->file("image");
              $file_name=time().'.'.$file->extension();
             $addpack = Package::insert([
                'cat_id'=>$request->input('cat_id'),
                'pr_title'=>$request->input('pr_title'),
                'slug'=>slugify($request->input('pr_title')),
                'description'=>$request->input('description'),
                'short_description'=>$request->input('short_description'),
                'price'=>$request->input('price'),
                'discount'=>$request->input('discount'),
                'day'=>$request->input('day'),
                'home_view'=>$request->input('home_view'),
                'image'=>$file_name
            ]);

          if ($addpack) {
             $file->move(public_path('images/'),$file_name);
             return redirect('/admin/package')->with('success','inserted');
                       }

          else{
            return back()->with('fail','Something Went wrong Try Again!');
          }
         }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::where('id',$id)->first();
        $category = Category::all();
        return view('admin.package_edit',compact('package','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'cat_id' =>'required',
            'pr_title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric|min:1',
            'discount' =>'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
             ]);
             if ($request->file("image") !="") {
                $file=$request->file("image");
                $file_name=time().'.'.$file->extension();
                $updateproduct = Package::where('id', $id)->update([
                    'cat_id'=>$request->input('cat_id'),
                    'pr_title'=>$request->input('pr_title'),
                    'slug'=>slugify($request->input('pr_title')),
                    'description'=>$request->input('description'),
                    'price'=>$request->input('price'),
                    'discount'=>$request->input('discount'),
                    'day'=>$request->input('day'),
                    'short_description'=>$request->input('short_description'),
                    'home_view'=>$request->input('home_view'),
                    'image'=>$file_name
               ]);
    $file->move(public_path('images/'),$file_name);

    }elseif ($request->file("image")==""){
        $updateproduct = Package::where('id', $id)->update([
            'cat_id'=>$request->input('cat_id'),
            'pr_title'=>$request->input('pr_title'),
            'slug'=>slugify($request->input('pr_title')),
            'description'=>$request->input('description'),
            'day'=>$request->input('day'),
            'price'=>$request->input('price'),
            'discount'=>$request->input('discount')
            ]);

             if ($updateproduct) {

                return redirect('/admin/package')->with('success','inserted');
                  }
             else{
               return back()->with('fail','Something Went wrong Try Again!');
             }

    }else {

    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $send = Package::destroy($id);
        if ($send) {
            return back()->with('success','Deleted');
        }else {
            return back()->with('error','Something wrong');
        }
    }
    public function delimage($id)
    {
        $send = Image::destroy($id);
        if ($send) {
            return back()->with('success','Deleted');
        }else {
            return back()->with('error','Something wrong');
        }
    }

    public function imageindex()
    {
        $packages = Package::where('is_active','0')->get();
        $images = Image::all();
        return view('admin.multipleimage',compact('packages','images'));
    }

    public function multipleimage(Request $request)
    {
    $filetest =$request->validate([
        'image' => 'required',
     ]);



   if ($request->image !="") {
$getfile = $request->file("image");

    foreach ($getfile as  $key=>$file) {

    $file_name=time().$key.'.'.$file->extension();
       $imgins = Image::insert([
        'image'=>$file_name,
        'package_id'=>$request->input('package_id')

      ]);
     $file->move(public_path('images/'),$file_name);
  }
    if ($imgins) {

      return back()->with('success','Successfully New subCategory Created');
    }
    else{
      return back()->with('fail','Something Went wrong Try Again!');
    }

   }
}

}
