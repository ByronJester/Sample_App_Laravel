<?php

namespace App\Repositories\UsersManagementRepository;


use App\Models\AccountsManagementModel;
use Illuminate\Support\Facades\Auth;



class UsersRepository implements RepositoryInterface {
	protected $model;

  public function __construct(AccountsManagementModel $model){
    $this->model = $model;
  }

	public function createAccount($request){
		$un = $request->input('un');
		$em = $request->input('em');
		$pw = $request->input('pw');
		$cp = $request->input('cp');

		$code = 0;
		$msg 	= "Error in creating account!";

		if($un === null || $em === null || $pw === null || $cp === null){
			$msg 	= "All fields are required!";
		}else{
			if($cp == $pw){
				$users = $this->model->registerAccount($un, $pw, $em);

				if($users > 0){
					$code = 1;
					$msg 	= "Successfully Created Account";
				}
			}else{
				$msg = "Confirm Password doesn't match!";
			}
		}

		$res = [
			'code' => $code,
			'msg'  => $msg
		];

		return $res;
	}

	public function loginAccount($request){
		$un = $request->input('un');
		$pw = $request->input('pw');

		$code = 0;
		$msg 	= "Login Account Error";

		if($un == "" || $pw == ""){
			$msg = "There's an empty field!";
		}else{
			$user = $this->model->loginAccount($un, $pw);

			if(count($user) > 0){
				$code = 1;
				$msg 	= "Successfully Login!";

				$request->session()->put('id', $user[0]->id);
			}else{
				$msg  = "Incorrect Credentials!";
			}
		}

		$res = [
			'code' => $code,
			'msg'  => $msg
		];

		return $res;

	}
}