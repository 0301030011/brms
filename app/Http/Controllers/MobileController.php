<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class MobileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', [
			'except' => ['index']
		]);
	}
	public function index(Request $request)
    {
    	$book=Book::find($request->book);
    	$src=$request->src;
    	return view('mobiles.index',compact('book','src'));
    }
}