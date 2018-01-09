<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class SessionsController extends Controller
{
	/*登录界面*/
	public function create()
	{
		return view('sessions.create');
	}
	/*登录行为*/
	public function store(Request $request)
	{
		$credentials=$this->validate($request,[
			'email'=>'required|email',
			'password'=>'required'
		]);
		if (Auth::attempt($credentials))
		{
			$name=User::find(Auth::id())->name;
			session()->flash('success', $name.' 欢迎回来！');
			return redirect()->route('users.index');
		}
		else
		{
			session()->flash('error', '很抱歉，您的邮箱和密码不匹配');
			return redirect()->back();
		}
	}
}
