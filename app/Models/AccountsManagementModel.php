<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class AccountsManagementModel extends Model{
  
  public static function registerAccount($un, $pw, $em){
  	$sql = DB::insert("INSERT INTO employee_tbl (username, password, email) VALUES ('$un', '$pw', '$em')");

  	return $sql;
  }

  public static function loginAccount($un, $pw){
  	$sql = DB::select("SELECT * FROM employee_tbl WHERE username = '$un' OR email = '$un' AND password = '$pw'");

  	return $sql;
  }
}
