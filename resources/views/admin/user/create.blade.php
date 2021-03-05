@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-6">
		<h3>Tạo tài khoản</h3>
		<form method="post" action="{{URL::to('admin/user')}}">
			@csrf
			<div class="form-group">
				<label>username</label>
				<input class="form-control" type="" name="user">
			</div>
			<div class="form-group">
				<label>pass</label>
				<input class="form-control" type="" name="pass">
			</div>
			<div class="form-group">
				<select class="form-control" name="level">
					<option value="1">10tr</option>
					<option value="5">50tr</option>
					<option value="10">100tr</option>
				</select>
			</div>
			<button class="btn-warning btn">
				ok
			</button>
		</form>
	</div>
</div>
@endsection