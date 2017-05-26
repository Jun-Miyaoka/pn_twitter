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
    return view('home')->with('posts', $posts)->with('users', $users);
  }

  public function show_user($id){
    $user = User::find($id);
    return view('user')->with('user', $user);
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
