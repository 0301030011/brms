<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BindController extends Controller
{
	public function edit($bind)
	{
		$book=Book::find($bind);
		return view('binds.edit',compact('book'));
	}

	public function update($bind,Request $request)
	{
		$book=Book::find($bind);
		$menu=json_encode($request->menu);
		$book->menu=$menu;
		$book->save();
	}
}