<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tin;

class TinController extends Controller
{
    //
    public function index(){

    	$tin = Tin::paginate(5);
    	//Call Model Tin, that you can call it with condition like where, order by or something else

    	return view('tin',['tin'=>$tin]);
    }
}
