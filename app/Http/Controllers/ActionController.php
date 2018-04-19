<?php

namespace App\Http\Controllers;

use App\Like;
use App\Comment;
use App\Repost;

use Auth;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($post_id)
    {
        $like = New Like;
        $like->user_id = Auth::id();
        $like->post_id = $post_id;
        $like->save();

        return 1;
    }

    public function dislike($post_id)
    {
        Like::where('user_id', Auth::id())->where('post_id', $post_id)->delete();

        return 1;
    }

    public function addComment(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->whom = $request->whom;
        $comment->save();

        return 1;
    }

    public function removeComment($comment_id)
    {
        Comment::where('user_id', Auth::id())->where('id', $comment_id)->delete();

        return 1;
    }

    public function addRepost(Request $request)
    {
        $repost = new Repost;
        $repost->user_id = Auth::id();
        $repost->post_id = $request->post_id;
        $repost->save();

        return 1;
    }

    public function removeRepost($repost_id)
    {
        Repost::where('user_id', Auth::id())->where('id', $repost_id)->delete();

        return 1;
    }
}
