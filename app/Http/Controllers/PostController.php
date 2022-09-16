<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->paginate(4);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        return back();
    }
}