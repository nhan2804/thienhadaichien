@extends('user.master')
@section('home')
<div class="row">
	<div class="col-4">
		
	<h3 class="mt-0">Tạo tài khoản</h3>
		<form method="post" action="{{URL::to('dashboard/user')}}">
		@csrf
		<div class="form-group">
			<label>Tên đăng nhập</label>
			<input type="text" class="form-control" name="user" id="">
		</div>
		<div class="form-group">
			<label>Tên đăng nhập</label>
			<input type="text" class="form-control" name="pass" id="">
		</div>
		<div class="form-group">
		Loại tài khoản
		<select name="level" class="form-control">
			@if($user->level>=5){
			<option value="1">10tr</option>
			}
			@endif
			@if($user->level>=10)
			<option value="5">50tr</option>
			@endif
		</select>
		</div>
		<button class="btn btn-warning">
			Tạo tài khoản
		</button>
	</form>
	</div>
	<div class="col-lg-8">
		<br>
		<div class="table table-responsive">
			<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Tên đăng nhập</th>
      <th scope="col">Mật khẩu</th>
      <th scope="col">Vàng</th>
      <th scope="col">Hành động</th>
    </tr>
  </thead>
  <tbody>
     
   @foreach($users as $k=>$v)
    <tr>
      <th>{{$v->id}}</th>
      <td>{{$v->name}}</td>
      <td>{{$v->password}}</td>
      <td>{{$v->coint}}</td>
      <td><a href="#" class="btn btn-warning">Sửa</a>
      	<a href="#" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
		</div>
	</div>
</div>
@endsection