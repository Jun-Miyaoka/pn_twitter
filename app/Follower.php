<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
  public function user(){
    return $this->hasOne('App\User', 'id', 'follow_id');
  }


}
