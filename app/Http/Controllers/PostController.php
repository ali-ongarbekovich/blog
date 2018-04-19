<?php

namespace App\Http\Controllers;

use App\Post;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
    public function index()
    {
        $posts = Post::whereIn('user_id', [Auth::id()])->get();

        return view('home', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::where('user_id', Auth::id())->where('id', $id)->get();

        return view('editor', compact('post'));
    }

    public function create()
    {
        return view('editor');
    }

    public function add(Request $request)
    {
        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->file != null) {
            $post->file = $request->file;
        }
        $post->save();

        return back();
    }

    public function update(Request $request)
    {
        Post::where('id', $request->post_id)->update(['title' => $request->title, 'body' => $request->body, 'file' => $request->file]);

        return back();
    }

    public function delete($id)
    {
        Post::where('user_id', Auth::id())->where('id', $id)->delete();

        return back();
    }

    public function addPicture(Request $request)
    {
        $path = $request->file('file')->store('public/images');
        $path = str_replace('public/', 'storage/', $path);
        return $path;
    }

    public function removePicture($name)
    {
        Storage::delete($name);

        return ['msg' => 'Deleted!'];
    }
}
