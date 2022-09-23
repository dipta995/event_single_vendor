<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::leftJoin('users','users.id','reviews.user_id')->leftJoin('packages','packages.id','reviews.package_id')->select('reviews.*','users.*','packages.*','reviews.id as review_id')->where('replay',null)->get();
        return view('admin.reviews',compact('reviews'));

    }

    public function sendReview(Request $request)
    {
        dd($request->all());
        if ($request->input('submit')) {
         $send =Review::create([
            'user_id' => Auth::user()->id,
            'package_id' => $request->input('package_id'),
            'comment' => $request->input('comment'),
            'comment_at' => date('d-m-Y'),

        ]);

        if ($send) {
            return back()->with('success','inserted');
        }else {
            return back()->with('error','Something wrong');
        }
    }
}
    public function sendreplay(Request $request)
    {
         $send =Review::where('id', $request->input('id'))->update([
            'replay' => $request->input('replay'),
            'replay_at' => date('d-m-Y'),
        ]);

        if ($send) {
            return back()->with('success','inserted');
        }else {
            return back()->with('error','Something wrong');
        }

    }
}
