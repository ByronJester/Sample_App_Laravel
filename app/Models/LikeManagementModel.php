<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeManagementModel extends Model
{
  protected $table = 'like_post_tbl';

  protected $fillable = ['post_id', 'user_id', 'is_like'];
    
}
