<?php

namespace App\Repositories\HomepageManagementRepository;

use App\Models\HomepageManagementModel;
use App\Models\UsersManagementModel;
use App\Models\LikeManagementModel;

class HomepageRepository implements HomepageRepositoryInterface {
  protected $post_model;
  protected $user_model;
  protected $like_model;

  public function __construct(
    HomepageManagementModel $post_model, 
    UsersManagementModel $user_model,
    LikeManagementModel $like_model
  ){
    $this->post_model = $post_model;
    $this->user_model = $user_model;
    $this->like_model = $like_model;
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
      $msg  = "Successfully posted a status!";
    }

    $res = [
      'code'    => $code,
      'status'  => 'Alright',
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
        'count'   => count($this->like_model->all()->where('post_id', $post->post_id)->where('is_like', 1)),
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
      $msg  = "Your post has been deleted!";
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
      $msg  = "Post updated successfully!";
    }

    $res = [
      'code' => $code,
      'msg'  => $msg
    ];

    return $res;
  } 

  public function likePost($request){
    $code = 0;
    $msg  = "There's an error liking post!";

    $user_id   = $request->session()->get('id');
    $has_exist = $this->like_model->all()->where('post_id', $request->post_id)->where('user_id', $user_id);

    if(count($has_exist) > 0){
      $status   = $this->like_model->where('post_id', $request->post_id)->where('user_id', $user_id)->get()[0]['is_like'];
      $has_like = "";

      if($status > 0){
        $has_like = $this->like_model->where('post_id', $request->post_id)->where('user_id', $user_id)->update(['is_like' => 0]);
        $code = 0;
      }else{
        $has_like = $this->like_model->where('post_id', $request->post_id)->where('user_id', $user_id)->update(['is_like' => 1]);
        $code = 1;
      }
      
      if($has_like){
        $msg  = $code > 0 ? "You liked this post!" : "You unliked this post!";
      }
    }else{
      $has_like = $this->like_model->create([
        'post_id' => $request->post_id,
        'user_id' => $user_id,
        'is_like' => 1
      ]);

      if(count($has_like) > 0){
        $code = 1;
        $msg  = "You liked this post!";
      }
    }

    $res = [
      'code' => $code,
      'msg'  => $msg
    ];

    return $res;
  }
} 