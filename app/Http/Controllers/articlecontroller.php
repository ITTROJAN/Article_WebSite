<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\article;
use Illuminate\Support\Facades\Input;
use Mail;
use Carbon\Carbon;
class articlecontroller extends Controller
{

public function test(Request $request){
$art=new article;
$this->validate($request,[
           'title'=>'min:2|max:25',]);
$art->user_id=Auth::user()->id;
$art->data=$request->input('data');
$art->title=$request->input('title');
if($request->input('private')=="on"){
  $art->public=0;
}
else{$art->public=1;}
$art->category=$request->input('cat');
if(Auth::user()->isadmin==1){
$art->ispublished=1;
}
$art->save();
$allart=article::where('user_id',Auth::user()->id)->get();
$needto=article::where('ispublished',0)->get();
return view('home',['art_list' => $allart],['artn_list' => $needto]);

}

public function viewedit(Request $request,$id){
$art=article::findOrFail($id);
  return view('edit')->with('art', $art);
}

public function edit(Request $request,$id){
$art=article::findOrFail($id);
$art->user_id=Auth::user()->id;
$art->data=$request->input('data');
$art->title=$request->input('title');
if($request->input('private')=="on"){
  $art->public=0;
}
else{  $art->public=1;
}
$art->category=$request->input('cat');
$art->save();
//echo "successfull";
$allart=article::where('user_id',Auth::user()->id)->get();
$needto=article::where('ispublished',0)->get();
return view('home',['art_list' => $allart],['artn_list' => $needto]);}

public function search(Request $request)
{
  $query=$request->input('search');
  $cat=$request->input('cat');
  if($cat=='any'){
    $articles=article::where([['title','LIKE','%'.$query.'%'],['public','=','1'],['ispublished','=','1'],['category',$cat]])->get();
  }
else {$articles=article::where([['title','LIKE','%'.$query.'%'],['public','=','1'],['ispublished','=','1']])->get();
}
    return view('searched')->with('list',$articles);
}

public function view1(Request $request,$id){
$art=article::findOrFail($id);
if($art->public==1 || Auth::user()->isadmin==1){
//return view("print")->with('print','successfull');
return view("viewart")->with('art',$art);
}
else {
if(Auth::check()){
if($art->user_id==Auth::user()->id){
}
else {return view("print")->with('print','Sorry! You Cant View This Article');}
}
else{return view("print")->with('print','You Have To sign in to View This Article');}
}
}

public function deletee(Request $request,$id){
if(Auth::check()){
$art=article::findOrFail($id);
if($art->user_id==Auth::user()->id || Auth::user()->isadmin==1){
$art->delete();
$allart=article::where('user_id',Auth::user()->id)->get();
$needto=article::where('ispublished',0)->get();
return view('home',['art_list' => $allart],['artn_list' => $needto]);
}
}
else{return view("print")->with('print','You Have To sign in to View This Article');}
}

public function publish(Request $request,$id)
{
if(Auth::check()){
if(Auth::user()->isadmin==1){
$art=article::findOrFail($id);
$art->ispublished=1;
$art->save();
$allart=article::where('user_id',Auth::user()->id)->get();
$needto=article::where('ispublished',0)->get();
return view('home',['art_list' => $allart],['artn_list' => $needto]);
}
  else{return view("print")->with('print','You Dont have permission to do this operation');}

}
  else{return view("print")->with('print','You Have To sign in to publish This Article');}

}
public function welcome(){


$art=article::whereMonth('updated_at',date('m'))->get();

  return view("welcome")->with('art',$art);
}

public function show($id)
{
    $art=article::find($id);
    return response()->json($art,200);
}



}
