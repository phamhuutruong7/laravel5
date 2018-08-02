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
}
