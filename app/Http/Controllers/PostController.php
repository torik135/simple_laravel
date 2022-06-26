<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//model
use App\Models\Post;

class PostController extends Controller
{
    //
	public function index()
	{
		# code...
		$posts = Post::latest()->with(['user', 'likes'])->paginate(15);

		return view('posts.index', [
			'posts' => $posts
		]);
	}

	public function show(Post $post)
	{
		# code...
		return view('posts.show', [
			'post' => $post
		]);
	}

	public function store(Request $req)
	{
		# code...
		//dd('post');
		$this->validate($req, [
			'body' => 'required',
		]);

		$req->user()->posts()->create($req->only('body'));

		return back();
	}

	public function destroy(Post $post)
	{
		# code...

		$this->authorize('delete', $post);

		$post->delete();

		return back();
	}
}
