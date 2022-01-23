<?php

namespace App\Http\Controllers\democontrol;

use App\Http\Controllers\Controller;
use App\Models\SimpleCrud;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $send = SimpleCrud::create($request->all());
        if ($send) {
            return back()->with('success','inserted');
        }else {
            return back()->with('error','Something wrong');
        }

        // return redirect()->route('products.index')
        //                 ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $userinfo = SimpleCrud::findOrFail($id);

        return view('admin.edit',compact('userinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userinfo = SimpleCrud::findOrFail($id);

        return view('admin.edit',compact('userinfo'));
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
            'name' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $send =  SimpleCrud::where('id', $id)->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'address' => $request->address,

            ]);
        if ($send) {
            return back()->with('success','inserted');
        }else {
            return back()->with('error','Something wrong');
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
        //
    }
}
