@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
	<li><a href="{{URL::to('dashboard/headquarter/expeditionary-army')}}">Quân viễn chinh</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/defense')}}">Phòng thủ công trình</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Trạm thuộc địa</a></li>
</ul>
@endsection
@section('content')
	@yield('content')
	<h4>BỘ CHỈ HUY</h4>
	<div>
		<table border style="width: 100%;text-align: center;">
			
			@foreach($my_milis as $k=>$v)
			<tr>
				<td>{{$v->name_m}} : {{$v->quantity}}</td>
			</tr>
			@endforeach
			
		</table>

	</div>
	<div class="d-flex justify-content-end">
		<a class="btn btn-secondary" href="attack">ĐI ĐẾN</a>
	</div>
<div>
</div>
@endsection