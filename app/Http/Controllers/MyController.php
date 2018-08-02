<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
