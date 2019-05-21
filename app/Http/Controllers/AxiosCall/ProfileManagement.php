<?php

namespace App\Http\Controllers\AxiosCall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProfileManagementRepository\ProfileRepository;

class ProfileManagement extends Controller
{
  protected $todo;

  public function __construct(ProfileRepository $todo){
    $this->repo = $todo;

  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function setupProfile(Request $request){
    $id = $request->session()->get('id');

    if($id == ""){
      return redirect('/logout');
    }else{
      return $this->repo->setupProfile($request, $id);
    }

  }
}
