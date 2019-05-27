<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProfileManagementModel extends Model
{

	public static function checkProfile($id){
  	$sql = DB::select("SELECT * FROM emp_profile_tbl WHERE user_id = $id");

  	return $sql;
  }

  public static function setupProfile($id, $new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un){
  	$sql = DB::insert("INSERT INTO emp_profile_tbl (user_id,	image,	fullname,	email,	contact,	age, gender,	birthdate,	address,	course,	college) VALUES ('$id', '$new_name', '$fn', '$em', '$cn', '$age', '$gen', '$bd', '$ad', '$cc', '$un')");

  	return $sql;
  }

  public static function updateProfile($new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un, $id){
  	$sql = "";

  	if(str_contains($new_name, '/assets/images/profile_picture/')){
  		$sql = DB::update("UPDATE emp_profile_tbl SET fullname = '$fn', email = '$em', contact = '$cn', age = '$age', gender = '$gen', birthdate = '$bd', address = '$ad', course = '$cc', college = '$un' WHERE profile_id = '$id'");
  	}else{
  		$sql = DB::update("UPDATE emp_profile_tbl SET image = '$new_name', fullname = '$fn', email = '$em', contact = '$cn', age = '$age', gender = '$gen', birthdate = '$bd', address = '$ad', course = '$cc', college = '$un' WHERE profile_id = '$id'");
  	}

  	return $sql;
  }

  public static function deleteProfile($id){
  	$sql = DB::delete("DELETE FROM emp_profile_tbl WHERE profile_id = $id");

  	return $sql;
  }
}
