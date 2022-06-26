<?php

use Illuminate\Support\Facades\Route;

// controller import
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

Route::get('/', function() {
	return redirect('home');
});

Route::get('/home', function() {
	return view('home');
})->name('home');

// HOME
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');


// PROFILE !!!!!!!!!!THIS IS ERR
Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])
->name('users.posts');


// REGIS
Route::get('/register', [RegisterController::class, 'index'])
->name('register');
Route::post('/register', [RegisterController::class, 'store']);


// LOGIN
Route::get('/login', [LoginController::class, 'index'])
->name('login');
Route::post('/login', [LoginController::class, 'store']);


// LOGOUT
Route::post('/logout', [LogoutController::class, 'store'])
->name('logout');


// POSTS
Route::get('/posts', [PostController::class, 'index'])
->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])
->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])
->name('posts.likes'); // {post} param dari fungsi didalam controller PostLike
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])
->name('posts.likes');
