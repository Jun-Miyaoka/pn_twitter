<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function follower(){
      return $this->belongsTo('App\Follower','user_id','follow_id');
    }
}
