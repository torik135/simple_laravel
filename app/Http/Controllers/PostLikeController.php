<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model
use App\Models\Post;

class PostLikeController extends Controller
{

    public function __construct(Type $var = null)
    {
        # code...
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $req)
    {
        # code...
        // dd($post->likedBy($req->user()));

        $post->likes()->create([
            'user_id' => $req->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post, Request $req)
    {
        # code...
        $req->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
