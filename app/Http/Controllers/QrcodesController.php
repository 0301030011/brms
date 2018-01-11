<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodesController extends Controller
{
	public function zip(Request $request)
	{
		$id=intval($request->id);
		$menu=json_decode(Book::find($id)->menu);
		foreach ($menu as $value)
		{
			for ($i=1; $i < count($value); $i++)
			{
				$section=$value[$i];
				$sectionname=$value[$i][0];
				$sectionresourcename=$value[$i][1];
				$sectionresourcepath=$value[$i][2];
				QrCode::generate($sectionresourcepath, public_path('storage/qrcodes/'.$sectionname.'.svg'));
			}
		}
	}
}
