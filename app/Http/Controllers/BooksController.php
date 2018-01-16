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
		$book=$this->validate($request,[
				'name'=>'required',
				'isbn'=>'required',
				'cover'=>'required|mimes:jpeg,jpg,png',
				// 使用 regex 模式时，规则必须放在数组中，而不能使用管道分隔符，尤其是正则表达式中已经使用了管道符号时
				'isbn'=> array('regex:/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i'),
		],[
			'isbn.required'=>'ISBN 不能为空。',
			'isbn.regex'=>'ISBN 格式有误。',
			'cover.required'=>'封面 不能为空。',
			'cover.mimes'=>'封面 必须是一个 jpeg, jpg, png 类型的文件。',
		]);
		extract($book);
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

	public function edit(Book $book)
	{
		return view('books.edit',compact('book'));
	}

	public function update(Book $book,Request $request)
	{
		$this->validate($request,[
				// 使用 regex 模式时，规则必须放在数组中，而不能使用管道分隔符，尤其是正则表达式中已经使用了管道符号时
				'isbn'=> array('regex:/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i'),
		],[
			'isbn.regex'=>'ISBN 格式有误。',
		]);
		if ($request->has('menu'))
		{
			$menu=json_encode($request->menu);
			$book->menu=$menu;
			$book->save();
		}
		else
		{
			if ($request->has('name') and $request->name!=null and $book->name!=$request->name)
			{
				$book->name=$request->name;
				session()->flash('success', '图书 '.$book->name.' 名称修改成功!');
				$book->save();
			}
			if ($request->has('isbn') and $request->isbn!=null and $book->isbn!=$request->isbn)
			{
				$book->isbn=$request->isbn;
				session()->flash('success', '图书 '.$book->name.' ISBN修改成功!');
				$book->save();
			}
			if ($request->has('cover') and $request->cover!=null)
			{
				$cover=$request->cover;
				$extension=$cover->getClientOriginalExtension();
				/*获取临时文件的绝对路径*/
				$real_path=$cover->getRealPath();
				/*储存文件的名字*/
				$cover_name=date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $extension;
				/*储存文件*/
				Storage::disk('books')->put($cover_name, file_get_contents($real_path));
				/*Delete old cover*/
				Storage::disk('books')->delete($book->cover_name);
				/*获取文件路径*/
				$cover_path=asset('storage/books/'.$cover_name);
				$book->update(compact('cover_name','cover_path'));
				session()->flash('success', '图书 '.$book->name.' 封面修改成功!');	
			}
			return back();
		}
	}

	public function destroy(Book $book)
	{
		$book->delete();
		Storage::disk('books')->delete($book->cover_name);
		session()->flash('success', '图书'.$book->name.' 删除成功!');
		return back();
	}

}
