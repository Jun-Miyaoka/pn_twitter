<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follower;
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
        $users = User::all();
        return view('home')->with('users', $users);
    }

    public function show(){
      $posts = Post::orderBy('created_at', 'desc')->get();
      return view('tweet')->with('posts', $posts);
    }

    public function show_user($id){
      $user = User::find($id);
      $posts = $user->posts;
      return view('user')->with('posts', $posts);
    }

    public function store(Request $request){
      $post = new Post();
      $user_id = Auth::id();
      $post->body = $request->body;
      $post->user_id = $user_id;
      $post->save();
      return redirect('/home');
    }

    public function follow($id){
      $follower = new Follower();
      $follower->follow_id = $id;
      $follower->user_id = Auth::id();
      $follower->save();
      return redirect('/tweet');
    }

    public function show_follow(){
      $follows = Follower::where('user_id', Auth::id())->get();
      for($i=0; $i<count($follows); $i++){
          $follows_id[$i] = $follows[$i]->follow_id;
      }
      $posts = Post::where('user_id',3,4)->get();
      dd($posts);

    }


}
