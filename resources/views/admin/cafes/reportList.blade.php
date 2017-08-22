
@if(count($cek))
	@foreach($cek as $items)
	<tr>
		<th scope="row"><img width="40px" src="{{ asset('') }}images/{{$items->avatar or 'user.png'}}"</th>
		<td>{{$items->name}}</td>
		<td>{{$items->desc}}</td>
		<td>{{$items->total}}</td>
	</tr>
	@endforeach
@else
<tr>
	<td colspan="4" align="center">No data Set</td>
</tr>
@endif
