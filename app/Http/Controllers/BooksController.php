<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Storage;

class BooksController extends Controller
{
	public function index(Request $request)
	{
		$name=$request->name;
		$books=Book::where('name','like','%'.$name.'%')->orderBy('created_at', 'desc')->paginate(14);
		/*未查询到结果*/
		if (count($books) < 1 and $name)
		{
			session()->flash('warning', '未找到名称为 '.$name.' 的图书!');
			return redirect()->route('books.index');
		}
		return view('books.index',compact('books','name'));
	}

	public function store(Request $request)
	{
		$books=$this->validate($request,[
				'name'=>'required',
				'isbn'=>'required',
				'cover'=>'required'
		]);
		extract($books);
		/*获取扩展名*/
		$extension=$cover->getClientOriginalExtension();
		/*获取临时文件的绝对路径*/
		$real_path=$cover->getRealPath();
		/*储存文件的名字*/
		$cover_name=date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $extension;
		/*储存文件*/
		Storage::disk('books')->put($cover_name, file_get_contents($real_path));
		/*获取文件路径*/
		$cover_path=asset('storage/books/'.$cover_name);
		Book::create(compact('name','isbn','cover_name','cover_path'));
		session()->flash('success', '图书 '.$name.' 添加成功!');
		return back();
	}

	public function destroy(Book $book)
	{
		$book->delete();
		Storage::disk('books')->delete($book->cover_name);
		session()->flash('success', '图书'.$book->name.' 删除成功!');
		return back();
	}
}
