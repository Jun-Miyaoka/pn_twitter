<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
  public function posts(){
    return $this->hasMany('App\Post','user_id','follow_id');
  }
}
