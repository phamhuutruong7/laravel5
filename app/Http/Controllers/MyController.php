<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function XinChao()
    {
    	echo "Chao Cac Ban. Toi la MyController";
    }

    public function KhoaHoc($ten)
    {
    	echo "Khoa hoc:".$ten;
    	return redirect()->route('MyRoute');
    }

    public function GetURL(Request $request)
    {
    	//return $request->path();
    	//return $request->url();
    	/*if($request->isMethod('post'))
    		echo "Phuong thuc Get";
    	else
    		echo "Khong phai phuong thuc Get";
    	*/
    	if($request->is('My*'))
    		echo "Co My";
    	else
    		echo "Khong co My";
    }
    public function postForm(Request $request)
    {	
    	echo "Ten cua ban la : ";
    	echo $request->input('HoTen');
    }

    //Set Cookie
    public function setCookie()
	{
		$response = new Response();
		$response->withCookie('KhoaHoc', 'Laravel - KhoaPham', 0.1); 
		//For withCookie() we need 3 parameters. withCookie('nameOfCookie', 'valueOfCookie', 'durationOfTheCookie') 
		echo "Da set Cookie";
		return $response;
	}

	//Get Cookie
	public function getCookie(Request $request)
	{
		echo "Cookie cua ban la: ";
		return $request->cookie('KhoaHoc');
	}

	//Upload File
	public function postFile(Request $request)
	{
		if($request->has('myFile'))
		{
			//This hasFile() point to 'myFile' in postFile.blade.php. In that Tag
			//This hasFile() function is to check if file exist or not
			//To save the file we need these functions
			$file = $request->file('myFile');
			$fileName = $file->getClientOriginalName('myFile');
			echo $fileName;
			$file->move('img',$fileName);
			
		}
		else
		{
			echo "Chua co file";
		}
	}
}
 