<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
    	echo $request['username']."<br>";
    	echo $request['password'];
    }
}
