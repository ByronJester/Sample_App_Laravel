<?php

namespace App\Http\Controllers\AxiosCall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProfileManagementRepository\ProfileRepository;

class ProfileManagement extends Controller{

  protected $todo;

  public function __construct(ProfileRepository $todo){
    $this->repo = $todo;

  }

  public function index(Request $request){
    $id = $request->session()->get('id');

    if($id == ""){
      return redirect('/logout');
    }else{
      return $this->repo->checkUser($id);
    }
  }

  public function create(){
    
  }

  public function store(Request $request){
    $id = $request->session()->get('id');

    if($id == ""){
      return redirect('/logout');
    }else{
      return $this->repo->setupProfile($request, $id);
    }
  }


  public function show($id){

  }


  public function edit($id){

  }


  public function update(Request $request, $id){
    $session = $request->session()->get('id');

    if($session == ""){
      return redirect('/logout');
    }else{
      return $this->repo->updateUserProfile($request, $id);
    }
  }


  public function destroy($id){
    return $this->repo->deleteProfile($id);
  }
}
