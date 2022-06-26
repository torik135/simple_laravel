<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

	public function __construct()
	{
		# code...
		$this->middleware(['auth']);
	}

	public function index()
	{
		# code...
		// dd(auth()->user()->posts);
		return view('dashboard');
	}
}
