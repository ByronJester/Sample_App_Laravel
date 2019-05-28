<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageManagementModel extends Model
{
  protected $table = 'post_tbl';

  protected $fillable = ['user_id', 'post'];
}
 