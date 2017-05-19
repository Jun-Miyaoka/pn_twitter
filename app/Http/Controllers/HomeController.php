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

    public function show_user($id){
      $user = User::find($id);
      return view('user')->with('user', $user);
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
      $follow_id = Follower::where('user_id', Auth::id())->pluck('follow_id')->toArray();
      if(in_array($id, $follow_id)) {
        dd('You already follow');
      }else{
        /*
        $follower = new Follower();
        $follower->follow_id = $id;
        $follower->user_id = Auth::id();
        $follower->save();
        */
        return redirect('/home')->with('flash_message', 'Follow!');
      }
    }
}
