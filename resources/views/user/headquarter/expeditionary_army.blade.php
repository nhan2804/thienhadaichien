@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/headquarter/expeditionary-army')}}">Quân viễn chinh</a></li>
    <li><a href="{{URL::to('dashboard/defense')}}">Phòng thủ công trình</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Trạm thuộc địa</a></li>
</ul>
@endsection
@section('content')
	<h4>BỘ CHỈ HUY / QUÂN VIỄN CHINH</h4>
	<i>Tất cả các quân đang bay ngoài không gian (kể cả tàu chở hàng)</i>
	<div>
		<table class="table table-dark">
            <thead>
                <td>Số lượng</td>
                <td>Mục tiêu</td>
				<td>Liên minh</td>
				<td>Trạng thái</td>
            </thead>
			<tbody>
                @foreach($army as $k=>$v)
                <tr>
                    <td>{{$v->quantity}}</td>
                    <td>Hành tinh {{$v->location}}</td>
                    <td>OMG</td>
                    <td class="text-success">{{$v->time_attack}}</td>
                </tr>
                @endforeach
            </tbody>
		</table>
	</div>
<div>
</div>
@endsection