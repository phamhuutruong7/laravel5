@extends('layouts.master')

@section('NoiDung')

{{--This is the lesson about condition statement--}}

{{--If-Else Condition--}}
{{--@if($khoahoc != "")
{{$khoahoc}}
@else
{{"Khong co khoa hoc"}}
@endif
--}}
{{--For-Loop--}}
{{$khoahoc or "Khong co khoa hoc"}}
{{--This is another way to print like the If Else Condition--}}
<br>
@for($i = 1; $i<=10; $i++)
	{{$i.""}}
@endfor





@endsection