<style type="text/css">
	.pagination li
	{
		list-style: none;
		float: left;
		margin-left: 10px;
	}
</style>

@foreach($tin as $value)
	{{$value->idTin}}
	{{$value->TieuDe}}<br>
	
@endforeach

{{--This line to create on the route a thing line abc=123. That is meanless but the other still work fine--}}
{!! $tin->appends(['abc'=>'123'])->links() !!}

