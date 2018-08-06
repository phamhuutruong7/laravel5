<form action="{{route('postForm')}}" method ="post">
	{{csrf_field()}} 	
	<!--Need this line so Laravel can run. And this line can avoid the XSS attack-->
	<input type = "text" name = "HoTen">
	
	<input type = "submit">
</form>