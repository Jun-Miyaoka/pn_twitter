<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follower;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function user_tweet($id){
    $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    return view('usertweet')->with('posts', $posts);
  }

  public function follower_tweet($id){
    $followers = Follower::where('user_id',$id)->pluck('follow_id')->toArray();
    $posts = Post::whereIn('user_id', $followers)->orderBy('created_at', 'desc')->get();
    return view('followtweet')->with('posts', $posts);
    }

  public function destroy($id){
    $post = Post::find($id);
    $post->delete();
    return redirect('/home')->with('flash_message', 'Tweet Deleted!');
    }
}
