@if(Auth::check())

	<h1>Dang nhap thanh cong</h1>
	{{csrf_field()}}
	@if(isset($user))
		{{"Ten: ".$user->name}}
		<br>
		{{"Email: ".$user->email}}
		<br>
		<a href="{{url('logout')}}">Logout</a>
	@endif
@else
	<h1>Ban chua dang nhap</h1>
@endif