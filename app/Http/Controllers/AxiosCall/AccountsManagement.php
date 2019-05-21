<?php

namespace App\Http\Controllers\AxiosCall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UsersManagementRepository\UsersRepository;

class AccountsManagement extends Controller{
  protected $todo;

  public function __construct(UsersRepository $todo){
    $this->repo = $todo;

  }
 
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function registerAccount(Request $request){
    return $this->repo->createAccount($request);
  }

  public function loginAccount(Request $request){
    return $this->repo->loginAccount($request);
  }

}
