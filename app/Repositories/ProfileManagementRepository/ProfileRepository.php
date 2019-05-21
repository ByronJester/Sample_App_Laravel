<?php

namespace App\Repositories\ProfileManagementRepository;

use App\Models\ProfileManagementModel;



class ProfileRepository implements ProfileRepositoryInterface {

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

        $already_exist = ProfileManagementModel::checkProfile($id);

        if(count($already_exist) > 0){
          $msg = "Your profile has been already setup!";
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

          $has_set = ProfileManagementModel::setupProfile($id, $new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un);

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
		
} 