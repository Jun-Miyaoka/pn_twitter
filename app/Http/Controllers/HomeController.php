<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follower;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(){
    $followers = Follower::where('user_id', Auth::id())->pluck('follow_id')->toArray();
    $posts = Post::whereIn('user_id', $followers)->orderBy('created_at', 'desc')->get();
    $users = User::all();
    $posts_count = Post::where('user_id', Auth::id())->count();
    $followers_count = Follower::where('user_id', Auth::id())->count();
    return view('home')
    ->with('posts', $posts)
    ->with('users', $users)
    ->with('posts_count', $posts_count)
    ->with('followers_count', $followers_count);
  }

  public function store(Request $request){
    $this->validate($request, [
      'body' => 'required|max:140',
    ]);
    $post = new Post();
    $user_id = Auth::id();
    $post->body = $request->body;
    $post->user_id = $user_id;
    $post->save();
    return redirect('/home');
  }

  public function follow($id){
    $follow_id = Follower::where('user_id', Auth::id())->pluck('follow_id')->toArray();
    if(in_array($id, $follow_id)) {
      return redirect('/home')->with('flash_message', 'You already follow!');
    }else{
      $follower = new Follower();
      $follower->follow_id = $id;
      $follower->user_id = Auth::id();
      $follower->save();
      return redirect('/home')->with('flash_message', 'Follow!');
    }
  }
}
