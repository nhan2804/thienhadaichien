@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/market/galaxy')}}">Siêu thị ngân hà</a></li>
    <li><a href="{{URL::to('dashboard/market/free')}}">Siêu thị tự do</a></li>
</ul>
@endsection
@section('content')
	<h4>THỊ TRƯỜNG</h4>
	<div>
		<table border style="width: 100%;text-align: center;">
			<tr>
				<td>Tên hàng hóa</td>
				<td>Đơn giá</td>
				<td>Miêu tả</td>
				<td>Mua</td>
			</tr>
			<tr>
				<td>Lương thục</td>
				<td>1000 tiền</td>
				<td>Lương thực là vật phẩm chính.</td>
				<td><input type="number" name=""><input value="Mua" type="submit" name=""></td>
			</tr>
			
		</table>
	</div>
<div>
</div>
@endsection