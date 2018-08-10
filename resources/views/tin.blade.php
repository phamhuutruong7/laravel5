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

{!! $tin->links() !!}
