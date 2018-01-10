<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use Storage;

class ResourcesController extends Controller
{
	/*资源列表*/
	public function index(Request $request)
	{
		$name=$request->name;
		if ($request->has('ajax'))
		{
			$resources=Resource::where('name','like','%'.$name.'%')->orderBy('created_at', 'desc')->paginate(16);
			/*未查询到结果*/
			// if (count($resources) < 1 and $name)
			// {
			// 	session()->flash('warning', '未找到名称为 '.$name.' 的资源!');
			// 	return redirect()->route('resources.index');
			// }
			return $resources;
		}
		else
		{
			$resources=Resource::where('name','like','%'.$name.'%')->orderBy('created_at', 'desc')->paginate(8);
			/*未查询到结果*/
			if (count($resources) < 1 and $name)
			{
				session()->flash('warning', '未找到名称为 '.$name.' 的资源!');
				return redirect()->route('resources.index');
			}
			return view('resources.index',compact('resources','name'));
		}
	}

	/*储存资源*/
	public function store(Request $request)
	{
		$this->validate($request,[
			'name'=>'required',
			'resource'=>'required|file'
		]);
		$file=$request->resource;
		$name=$request->name;
		/*获取文件类型*/
		$type = $file->getClientMimeType(); 
		/*获取文件扩展名*/
		$extension=$file->getClientOriginalExtension();
		/*获取临时文件的绝对路径*/
		$real_path = $file->getRealPath();
		/*储存文件的名字*/
		$file_name = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $extension;
		/*储存文件*/
		Storage::disk('resources')->put($file_name, file_get_contents($real_path));
		/*获取文件路径*/
		$path=asset('storage/resources/'.$file_name);
		Resource::create(compact('name','file_name','type','path'));
		session()->flash('success', '资源 '.$name.' 添加成功!');
		return back();
	}

	/*删除资源*/
	public function destroy(Resource $resource)
	{
		$resource->delete();
		Storage::disk('resources')->delete($resource->file_name);
		session()->flash('success', '资源 '.$resource->name.' 删除成功!');
		return back();
	}
}
