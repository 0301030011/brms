<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', [
			'except' => ['create', 'store']
		]);
	}

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
		if (User::where('email',$request->email)->first()->status==1)
		{
			if (Auth::attempt($credentials))
			{
				$name=Auth::user()->name;
				session()->flash('success', $name.' 欢迎回来！');
				return redirect()->route('users.index');
			}
			else
			{
				session()->flash('error', '很抱歉，您的邮箱和密码不匹配');
				return redirect()->back();
			}
		}
		{
			session()->flash('info', '正在审核，请耐心等待管理员审核');
			return redirect()->back();
		}
	}

	public function destroy()
	{
		session()->flash('success', Auth::user()->name.' 已成功退出！');
	    Auth::logout();
	    return redirect('login');
	}
}
