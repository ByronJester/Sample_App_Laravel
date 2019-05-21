<?php

namespace App\Repositories\UsersManagementRepository;


use App\Models\AccountsManagementModel;



class UsersRepository implements RepositoryInterface {

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
				$users = AccountsManagementModel::registerAccount($un, $pw, $em);

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
			$user = AccountsManagementModel::loginAccount($un, $pw);

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