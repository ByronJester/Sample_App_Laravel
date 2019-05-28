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


	public function index(){
		return $this->repo->getPosts();
	}

  public function store(Request $request){

  	$validator = Validator::make($request->all(), [
        'post' => 'required|max:255'
    ]);

    if($validator->fails()){
    	$res = [
    		'error'  	=> count($validator->errors()),
    		'status'	=> 'Warning',
    		'msg' 		=> $validator->errors()
    	];

    	return $res;
    	
    }else {
    	return $this->repo->createPost($request);
    }
  }
}
