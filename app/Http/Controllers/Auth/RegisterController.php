<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// model
use App\Models\User;

class RegisterController extends Controller
{
    //

	public function __construct()
	{
		# code...
		$this->middleware(['guest']);
	}


	public function index()
	{
		# code...
		return view('auth.register');
	}

	public function store(Request $req)
	{
		# code...
		// dd = die dump
		// output semua input
		// dd($req->email);

		$this->validate($req, [
			'name' => 'required|max:100',
			'username' => 'required|max:100',
			'email' => 'required|email|max:100',
			'password' => 'required|confirmed',
		]);

		User::create([
			'name' => $req->name,
			'username' => $req->username,
			'email' => $req->email,
			'password' => Hash::make($req->password),
		]);

		auth()->attempt($req->only('email', 'password'));

		return redirect()->route('dashboard');
	}
}
