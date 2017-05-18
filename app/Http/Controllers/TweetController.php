<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follower;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function tweet(){
    $users = User::all();
    return view('tweet')->with('users', $users);
  }

  public function user_tweet($id){
    $user = User::find($id);
    return view('usertweet')->with('user', $user);
  }

  public function follower_tweet($id){
    $followers = Follower::where('user_id',$id)->get();
    return view('followtweet')->with('followers', $followers);
    }


}
