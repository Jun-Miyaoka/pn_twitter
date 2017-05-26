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

  public function show($id){
    $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    return view('tweet')->with('posts', $posts);
  }

  public function destroy($id){
    $post = Post::find($id);
    $post->delete();
    $user_id = Auth::id();
    return redirect()->action('TweetController@show', $user_id)->with('flash_message', 'Tweet Deleted!');
    }
}
