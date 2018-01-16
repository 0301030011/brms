<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', [
			'except' => ['create', 'store']
		]);
	}

	/*注册界面*/
	public function create()
	{
		return view('users.create');
	}
	/*注册行为*/
	public function store(Request $request)
	{
		$this->validate($request,[
			'name'=>'required|max:10',
			'email'=>'required|email|unique:users|max:25',
			'password'=>'required|max:25|min:8|confirmed|alpha_num'
		]);
		$user=User::create([
			'name'=>$request->name,
			'email'=>$request->email,
			'password'=>bcrypt($request->password)
		]);
		session()->flash('success', '您以注册成功请等待管理员审核通过');
		return redirect('login');
	}
	/*用户列表*/
	public function index()
	{
		$users=User::paginate(9);
		return view('users.index', compact('users'));
	}
	/*删除用户*/
	public function destroy(User $user)
	{
		$user->delete();
		session()->flash('success', '用户 '.$user->name.' 删除成功!');
		return back();
	}
}