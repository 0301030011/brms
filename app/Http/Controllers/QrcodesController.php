<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Chumper\Zipper\Zipper;
use Storage;

class QrcodesController extends Controller
{
	public function create(Request $request,Zipper $zipper)
	{
		$id=intval($request->id);
		$book=Book::find($id);
		$menu=json_decode($book->menu);
		$filelist=[];
		foreach ($menu as $value)
		{
			for ($i=1; $i < count($value); $i++)
			{
				$section=$value[$i];
				$sectionname=$value[$i][0];
				$sectionresourcename=$value[$i][1];
				$sectionresourcepath=$value[$i][2];
				QrCode::size(200)->generate($sectionresourcepath, public_path('storage/qrcodes/'.$sectionname.'.svg'));
				$filelist[]=$sectionname.'.svg';
			}
		}
		$zipper->make(public_path().'/storage/download/'.$book->isbn.'.zip')->folder($book->isbn)->add(public_path().'/storage/qrcodes/')->close();
		Storage::disk('qrcodes')->delete($filelist);
	}
}
