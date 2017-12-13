<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourcesController extends Controller
{
	/*资源列表*/
	public function index()
	{
		return view('resources.index');
	}

	/*储存资源*/
	public function store(Request $request)
	{
		dd($request->file('resource'));
	}
}
