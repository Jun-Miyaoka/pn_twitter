<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follower;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  public function comment($id){
    $post = Post::find($id);
    $comments = Comment::where('post_id', $id)->orderBy('created_at')->get();
    return view('comment')->with('post', $post)->with('comments', $comments);
  }

  public function store(Request $request, $postId){
    $comment = new Comment(['body' => $request->body]);
    $post = Post::findOrFail($postId);
    $post->comments()->save($comment);
    return redirect()->action('CommentController@comment', $postId);
  }

  public function destroy($id){
    $comment = Comment::find($id);
    $comment->delete();
    return redirect('/home')->with('flash_message', 'Commnet Deleted!');
  }
}
