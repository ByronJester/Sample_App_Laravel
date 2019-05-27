<?php

namespace App\Repositories\ProfileManagementRepository;

use App\Models\ProfileManagementModel;

class ProfileRepository implements ProfileRepositoryInterface {
  protected $model;

  public function __construct(ProfileManagementModel $model){
    $this->model = $model;
  }

  public function checkUser($id){
    $already_exist = $this->model->checkProfile($id);

    return $already_exist;
  }

	public function setupProfile($request, $id){
    $img = $request->image;
    $fn  = $request->f_name;
    $em  = $request->email;
    $cn  = $request->contact;
    $age = $request->age;
    $gen = $request->gender;
    $bd  = $request->date;
    $ad  = $request->address;
    $cc  = $request->course;
    $un  = $request->college;

    $code = 0;
    $msg  = "Set up profile error!";

    if($img == null || $fn == null || $em == null || $cn == null || $age == null || $gen == null || $bd == null || $ad == null || $cc == null || $un == null){
      $msg = "All field is required";
    }else{
      if($id != ""){

        $already_exist = $this->model->checkProfile($id);

        if(count($already_exist) > 0){
          $msg = "Your profile has been already set!";
        }else{
          $exploded = explode(',', $request->image);
          $decoded  = base64_decode($exploded[1]);

          if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
          }else{
            $extension = 'png';
          }

          $new_name = str_random().'.'.$extension;
          $path     = public_path('/assets/images/profile_picture/').'/'.$new_name;
          file_put_contents($path, $decoded);

          $has_set = $this->model->setupProfile($id, $new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un);

          if($has_set){
            $code = 1;
            $msg  = "Your Profile Set Up Successfully";
          }
        }

      }else{
        $msg = "Session Expired. Logout your account and try again";
      }
      
      $res = [
        'code' => $code,
        'msg'  => $msg
      ];

      return $res;
      
    }
	}


  public function updateUserProfile($request, $id){
    $img = $request->input('image');
    $fn  = $request->input('f_name');
    $em  = $request->input('email');
    $cn  = $request->input('contact');
    $age = $request->input('age');
    $gen = $request->input('gender');
    $bd  = $request->input('date');
    $ad  = $request->input('address');
    $cc  = $request->input('course');
    $un  = $request->input('college');

    $msg  = "There's no changes in your profile!";
    $code = 0;
    
    if($img == null || $fn == null || $em == null || $cn == null || $age == null || $gen == null || $bd == null || $ad == null || $cc == null || $un == null){
      $msg = "All field is required";
    }else{
      if(str_contains($request->image, '/assets/images/profile_picture/')){
        $new_name = $request->image;
        $has_updated = $this->model->updateProfile($new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un, $id);

        if($has_updated){
          $msg  = "Successfully Updated Your Profile!";
          $code = 1;
        }
      }else {
        $exploded = explode(',', $request->image);
        $decoded  = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg')){
          $extension = 'jpg';
        }else{
          $extension = 'png';
        }

        $new_name = str_random().'.'.$extension;
        $path     = public_path('/assets/images/profile_picture/').'/'.$new_name;
        file_put_contents($path, $decoded);

        $has_updated = $this->model->updateProfile($new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un, $id);

        if($has_updated){
          $msg  = "Successfully Updated Your Profile!";
          $code = 1;
        }
      }
      
      $res = [
        'msg'   => $msg,
        'code'  => $code
      ];

      return $res;

    }

  }
  
  public function deleteProfile($id){
    $msg  = "There's an error in deleting profile!";
    $code = 0;

    if($id != null){
      $has_deleted = $this->model->deleteProfile($id);

      if($has_deleted){
        $msg  = "Successfully Deleted Profile";
        $code = 1;
      }

      $res = [
        'msg'   => $msg,
        'code'  => $code
      ];

      return $res;
    }
  }
		
} 