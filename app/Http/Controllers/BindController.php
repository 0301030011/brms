<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BindController extends Controller
{
	public function index()
	{
		return view('binds.index');
	}
}
