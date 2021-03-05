@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/overview')}}">Tổng quan</a></li>
    <li><a href="{{URL::to('dashboard/news')}}">Tin tức</a></li>
    <li><a href="">Báo cáo</a></li>
    <li><a href="{{URL::to('dashboard/build')}}">Xây dựng công trình</a></li>
    <li><a href="{{URL::to('dashboard/military')}}">Xây dựng quân sự</a></li>
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
		<h4>TỔNG QUAN</h4>
		<h4>Công trình đã xây</h4>
		<table border style="width: 100%;text-align: center;">
		    @foreach($my_cons as $k=>$v)
			<tr>
				<td><span class="text-primary">{{count($v)}}</span> {{$v[0]->name_c}}</td>
			</tr>
			@endforeach
			
		</table>
		<h4>Lợi nhuận</h4>
		@php
		$s=0;
		@endphp
		<table border style="width: 100%;text-align: center;">
		    @foreach($pro as $k=>$v)
			<tr>
			    @foreach($v as $k1=>$v1)
			    @php
		        $s+=$v1->value_p
		        @endphp
			    @endforeach
			    
				<td>{{$v[0]->name_resource}} <span class="text-primary">{{$s}} /{{$v[0]->unit_p}}</span></td>
				@php
            		$s=0;
            	@endphp
            		
			</tr>
			@endforeach
			
		</table>
		<h4>Quân sự đã xây</h4>
		<table border style="width: 100%;text-align: center;">
		    @foreach($my_mili as $k=>$v)
			<tr>
				<td><span class="text-primary">{{count($v)}}</span> {{$v[0]->name_m}}</td>
			</tr>
			@endforeach
			
		</table>
	</div>
	<div class="d-flex justify-content-end">
		<a href="#">Xem thêm</a>
	</div>
<div>
</div>
@endsection