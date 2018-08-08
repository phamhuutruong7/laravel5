@extends('layouts.master')

@section('NoiDung')
	<h2>PHP</h2>
	{{$khoahoc}}
	{!!$khoahoc!!}
	{{-- The first way to print the data with double {} cant print the HTML code. But with the second way, we can print it with HTML code (like <b>, <h1>)--}}
@endsection