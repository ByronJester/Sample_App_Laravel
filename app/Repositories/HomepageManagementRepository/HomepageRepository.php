<?php

namespace App\Repositories\HomepageManagementRepository;

use App\Models\HomepageManagementModel;
use App\Models\UsersManagementModel;

class HomepageRepository implements HomepageRepositoryInterface {
  protected $post_model;
  protected $user_model;

  public function __construct(HomepageManagementModel $post_model, UsersManagementModel $user_model){
    $this->post_model = $post_model;
    $this->user_model = $user_model;
  }
  
  public function createPost($request){
    $code = 0;
    $msg  = "There's an error in posting!";

    $has_posted = $this->post_model->create([
      'user_id' => $request->session()->get('id'),
      'post'    => $request->post
    ]);

    if(count($has_posted) > 0){
      $code = 1;
      $msg  = "Status Posted Successfully!";
    }

    $res = [
      'code'    => $code,
      'status'  => 'Success',
      'msg'     => $msg
    ];

    return $res;
  }

  public function getPosts(){
    // $posts = $this->model->orderBy('created_at', 'desc')->get();
    // return $posts;

    $posts = $this->post_model->all();

    $res = [];

    foreach ($posts as $post) {
      $arr = [
        'post_id' => $post->post_id,
        'user_id' => $post->user_id,
        'post'    => $post->post,
        'created' => $post->created_at,
        'updated' => $post->updated_at,
        'name'    => $this->user_model->where('user_id', $post->user_id)->get(['fullname'])
      ];

      array_push($res, $arr);
    }

    return $res;

  }
} 