<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request)
    {

        if ($post->likedBy($request->user()))
        {
            return redirect()->back()->with('status', 'You already liked this post');
        }

        $post->likes()->create([
            'user_id' => $request->user()->id ,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->likes()->where('user_id', auth()->id())->delete();
        return back();
    }

}