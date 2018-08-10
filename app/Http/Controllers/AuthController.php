<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class AuthController extends Controller
{
    //This example is working with table USERS 
    //When we create the DB with the Seed, 
    //that make Auth can automatically recognize this point to User table
    //This require password to be hash
    //If you inser directly a record with a not hash password, it will not work.
    public function login(Request $request)
    {
    	$username = $request['username'];
    	$password = $request['password'];
    	if(Auth::attempt(['name'=>$username, 'password'=>$password]))
    	{	//This 'name' and 'password' here is from table Users
    		//If login succesful then attempt return true
    		return view('thanhcong',['user'=>Auth::user()]);
    		//The second argument is to print out the data of the user.
    		//After call it like this, you can call it in the thanhcong.blade.php
    	}
    	else
    	{
    		return view('dangnhap',['error'=>'Dang nhap that bai']);
    	}
    }
}
