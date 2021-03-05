@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/overview')}}">Tổng quan</a></li>
    <li><a href="{{URL::to('dashboard/news')}}">Tin tức</a></li>
    <li><a href="">Báo cáo</a></li>
    <li><a href="{{URL::to('dashboard/build')}}">Xây dựng</a></li>
    <li><a href="#">Nghiên cứu</a></li>
    <li><a href="{{URL::to('dashboard/headquarter')}}">Bộ chỉ Huy</a></li>
    <li><a href="{{URL::to('dashboard/intelligence-agencies')}}">Cơ quan tình báo</a></li>
    <li><a href="{{URL::to('dashboard/market')}}">Giao thương</a></li>
    <li><a href="#">Bộ ngoại giao</a></li>
    <li><a href="#">Bảng xếp hạng</a></li>
    <li><a href="#">Diễn đàn</a></li>
    <li><a href="#">Cài đặt</a></li>
    <li><a href="#">Thoát</a></li>
</ul>
@endsection
@section('content')
	<div>
		<h4>NHẬT BÁO HÀNH TINH</h4>
	<div>
		<table border style="width: 100%;text-align: center;">
			<tr>
				<td>Thời gian</td>
				<td>Loại hình</td>
				<td>Nội dung</td>
			</tr>
			<tr>
				<td>11/20/2021</td>
				<td>Nhà ở</td>
				<td>Xong</td>
			</tr>
			<tr>
				<td>11/20/2021</td>
				<td>Nhà ở</td>
				<td>Xong</td>
			</tr>
			<tr>
				<td>11/20/2021</td>
				<td>Nhà ở</td>
				<td>Xong</td>
			</tr>
		</table>
	</div>
<div>
</div>
@endsection