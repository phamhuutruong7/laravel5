{{ $error or ''}}
{{--If error is exist, it will print out the $error. If not it will print the string in the ''--}}
<form action="{{route('login')}}" method="post">
	{{csrf_field()}}
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<input type="submit">
</form>