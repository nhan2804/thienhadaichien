@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/headquarter/army')}}">Quân viễn chinh</a></li>
    <li><a href="{{URL::to('dashboard/news')}}">Phòng thủ công trình</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Trạm thuộc địa</a></li>
</ul>
@endsection
@section('content')
	<h4>BỘ CHỈ HUY / QUÂN VIỄN CHINH</h4>
	<i>Tất cả cá quân đang bay ngoài không gian (kể cả tàu chở hàng)</i>
	<div>
		<table border style="width: 100%;text-align: center;">
			<tr>
				<td></td>
				<td>Mục tiêu</td>
				<td>Liên minh</td>
				<td>Trạng thái</td>
			</tr>
			<tr>
				<td>1290</td>
				<td>Hành tinh 129.444.2.4</td>
				<td>OMG</td>
				<td class="text-success">8:20:20</td>
			</tr>
			
		</table>
	</div>
<div>
</div>
@endsection