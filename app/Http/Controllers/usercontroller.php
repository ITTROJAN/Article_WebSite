<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Session;
class usercontroller extends Controller
{

public function setting(Request $request,$id){
if(Auth::check()){
  if(Auth::user()->id==$id){
    $usr=user::findOrFail($id);
    return view('settings')->with('user',$usr);
  }
    else{return view("print")->with('print','You Dont Have permission to view this page');}

}


  else{return view("print")->with('print','You Have To sign in to View This Page');}



}
    //
}
