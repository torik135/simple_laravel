<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model
use App\Models\User;

class UserPostController extends Controller
{
    //
    public function index(User $user)
    {
        //  dd($user);

        $posts = $user->posts()->latest()->with(['user', 'likes'])->paginate(15);
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
