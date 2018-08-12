<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $allart=article::where('user_id',Auth::user()->id)->get();
      $needto=article::where('ispublished',0)->get();
      return view('home',['art_list' => $allart],['artn_list' => $needto]);
    }
}
