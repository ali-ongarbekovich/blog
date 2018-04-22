<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\Repost;
use App\Comment;

use Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        foreach ($posts as $post) {
            $post->likes = Like::where('post_id', $post->id)->count();
            $post->comments = Comment::where('post_id', $post->id)->count();
            $post->reposts = Repost::where('post_id', $post->id)->count();
        }

        if (Auth::id() != null) {
            $myLikes = json_decode(Like::where('user_id', Auth::id())->pluck('post_id'));
            $myReposts = Repost::where('user_id', Auth::id())->pluck('post_id');
        }

        return view('welcome', compact('posts', 'myLikes', 'myReposts'));
    }
}
