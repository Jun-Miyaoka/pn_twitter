<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
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
      $posts = Post::all();
      return view('tweet')->with('posts', $posts);
    }

    public function show_user(){
      $user = User::find(Auth::id());
      $posts = $user->posts;
      return view('tweet')->with('posts', $posts);
    }

    public function store(Request $request){
      $post = new Post();
      $user= Auth::id();
      $post->body = $request->body;
      $post->user_id = $user;
      $post->save();
      return redirect('/tweet');
    }
}
