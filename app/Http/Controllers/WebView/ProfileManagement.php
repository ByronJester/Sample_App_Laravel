<?php

namespace App\Http\Controllers\WebView;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileManagement extends Controller
{
   public function index(Request $request){
   	if($request->session()->get('id') == ""){
  		return redirect('/index');
  	}else{
   		return view('HomePage/profile');
   	}
   }
}
 