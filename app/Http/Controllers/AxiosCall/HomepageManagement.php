<?php

namespace App\Http\Controllers\AxiosCall;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\HomepageManagementRepository\HomepageRepository;

class HomepageManagement extends Controller
{
	protected $todo;

	public function __construct(HomepageRepository $todo){
		$this->repo = $todo;

	}

	public function index(Request $request){
		return $this->repo->getPosts($request);
	}

  public function store(Request $request){

  	$validator = Validator::make($request->all(), [
        'post' => 'required'
    ]);

    if($validator->fails()){
    	$res = [
    		'error'  	=> count($validator->errors()),
    		'status'	=> 'Error',
    		'msg' 		=> $validator->errors()
    	];

    	return $res;
    	
    }else {
    	return $this->repo->createPost($request);
    }
  }

  public function delete(Request $request, $id){
  	$session_id = $request->session()->get('id');
  	$user_id 		= $request->user_id;

  	if($user_id == $session_id){
  		return $this->repo->deletePost($id);
  	}else{
  		$res['code'] = 0;
  		$res['msg']  = "You can't delete post of others";

  		return $res;
  	}
  }

  public function update(Request $request, $id){
  	$session_id = $request->session()->get('id');
  	$user_id 		= $request->user_id;

  	$validator = Validator::make($request->all(), [
        'post' => 'required'
    ]);

    if($validator->fails()){
    	$res = [
    		'code'  	=> 'error',
    		'msg' 		=> $validator->errors()
    	];

    	return $res;
    }else{
    	if($user_id == $session_id){
	  		return $this->repo->editPost($request, $id);
	  	}else{
	  		$res['code'] = 0;
	  		$res['msg']  = "You can't edit post of others";

	  		return $res;
	  	}
    }
  }

  public function like(Request $request){
  	return $this->repo->likePost($request);
  }
}
