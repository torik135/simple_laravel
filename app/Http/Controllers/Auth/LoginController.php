<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
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

		return view('auth.login');
	}

	public function store(Request $req)
	{
		# code...
		$this->validate($req, [
			'email' => 'required|email',
			'password' => 'required',
		]);

		if (!auth()->attempt($req->only('email', 'password'), $req->remember)){
			return back()->with('status', 'Data Login salah!');
		}

		return redirect()->route('dashboard');
	}
}
