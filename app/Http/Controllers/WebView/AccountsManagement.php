<?php

namespace App\Http\Controllers\WebView;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountsManagement extends Controller
{

  public function index(Request $request){
    if($request->session()->get('id') == ""){
      return view('AccountsManagement/users');
    }else{
      return redirect('/home');
    }
    
  }

  public function login(Request $request){
    if($request->session()->get('id') == ""){
      return redirect('/login');
    }else{
      return redirect('/home'); 
    }
  }

  public function logout(Request $request){
    $request->session()->flush();

  	return redirect('/index');
  }

}
