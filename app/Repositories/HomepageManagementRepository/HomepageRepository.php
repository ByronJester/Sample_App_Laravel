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

  public function getPosts($request){
    $res   = [];
    $id    = $request->session()->get('id');
    $posts = $this->post_model->all();

    foreach ($posts as $post) {
      $arr = [
        'post_id' => $post->post_id,
        'user_id' => $post->user_id,
        'post'    => $post->post,
        'created' => $post->created_at,
        'updated' => $post->updated_at,
        'owner'   => $post->user_id == $id ? true : false,
        'name'    => count($this->user_model->where('user_id', $post->user_id)->get(['fullname'])) > 0
                     ? $this->user_model->where('user_id', $post->user_id)->get(['fullname'])[0]['fullname']
                     : "Unknown User"
      ];
      
      array_push($res, $arr);
    }

   
    return $res;

  }

  public function deletePost($id){
    $has_deleted = $this->post_model->where('post_id', $id)->delete();
    $code = 0;
    $msg  = "There's an error in deleting post!";

    if($has_deleted){
      $code = 1;
      $msg  = "You successfuly deleted your post!";
    }

    $res = [
      'code' => $code,
      'msg'  => $msg
    ];

    return $res;
  }

  public function editPost($request, $id){
    $has_updated = $this->post_model->where('post_id', $id)->update(['post' => $request->post]);
    $code = 0;
    $msg  = "There's an error in updating your post!";

    if($has_updated){
      $code = 1;
      $msg  = "Successfully updated your post!";
    }

    $res = [
      'code' => $code,
      'msg'  => $msg
    ];

    return $res;
  }
} 