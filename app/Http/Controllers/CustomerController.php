<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = User::where('role','user')->latest()->get();
        return view('admin.customer',compact('data'));
    }
    public function delete($id)
    {
        User::where('id',$id)->delete();
        return back()->with('success','Deleted');
    }
}
