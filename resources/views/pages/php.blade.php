@extends('layouts.master')

@section('NoiDung')

<?php $khoahoc = array('Laravel', 'PHP', 'iOS', 'ASP', 'Android');?>

{{--For each condition--}}
@if(!empty($khoahoc))
	@foreach($khoahoc as $value)
		{{$value}}
	@endforeach

@else
{{"Mang rong"}}
@endif
<br>
{{--For else condition--}}
@forelse($khoahoc as $value)
	{{$value}}
@empty
	{{"Mang rong"}}
@endforelse

<br>
{{--Continue--}}
@forelse($khoahoc as $value)
	@continue($value == "Laravel")
	{{$value}}
@empty
	{{"Mang rong"}}
@endforelse
<br>
{{--Break--}}
@forelse($khoahoc as $value)
	@break($value == "PHP")
	{{$value}}
@empty
	{{"Mang rong"}}
@endforelse

@endsection