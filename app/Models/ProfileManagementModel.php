<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProfileManagementModel extends Model
{
  public static function setupProfile($id, $new_name, $fn, $em, $cn, $age, $gen, $bd, $ad, $cc, $un){
  	$sql = DB::insert("INSERT INTO emp_profile_tbl (user_id,	image,	fullname,	email,	contact,	age, gender,	birthdate,	address,	course,	college) VALUES ('$id', '$new_name', '$fn', '$em', '$cn', '$age', '$gen', '$bd', '$ad', '$cc', '$un')");

  	return $sql;
  }

  public static function checkProfile($id){
  	$sql = DB::select("SELECT * FROM emp_profile_tbl WHERE user_id = $id");

  	return $sql;
  }
}
