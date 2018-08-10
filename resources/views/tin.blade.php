@foreach($tin as $value)
	{{$value->TieuDe}}<br>
@endforeach

{!! $tin->links() !!}
