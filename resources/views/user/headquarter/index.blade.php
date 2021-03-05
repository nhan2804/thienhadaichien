@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/headquarter/army')}}">Quân viễn chinh</a></li>
    <li><a href="{{URL::to('dashboard/news')}}">Phòng thủ công trình</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Trạm thuộc địa</a></li>
</ul>
@endsection
@section('content')
	<h4>BỘ CHỈ HUY</h4>
	<div>
		<table border style="width: 100%;text-align: center;">
			<tr>
				<td>Xe tăng : 2000</td>
			</tr>
			<tr>
				<td>Pháo phòng không : 2000</td>
			</tr>
			<tr>
				<td>Máy bay chiến đâu : 2000</td>
			</tr>
			<tr>
				<td>Xe tăng : 2000</td>
			</tr>
			<tr>
				<td>Xe tăng : 2000</td>
			</tr>
		</table>
	</div>
<div>
</div>
@endsection