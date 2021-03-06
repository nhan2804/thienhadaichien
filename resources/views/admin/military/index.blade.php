@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-6">
		<h3>Tạo quân sự</h3>
		<form method="post" action="{{URL::to('admin/military')}}">
			@csrf
			<div class="form-group ">
				<label>Tên quân sự</label>
				<input class="form-control" type="" name="name">
			</div>
			<div class="form-group">
			   <label>Thời gian xây dựng(phút)</label>
          <input class="form-control" type="" name="time">
			</div>
      <div class="form-group">
         <label>Miêu tả</label>
         <input type="" name="desc" class="form-control" id="">
      </div>
      <div class="form-group">
         <label>Cân nặng</label>
         <input type="" name="weight" class="form-control" id="">
      </div>
      <div class="form-group">
         <label>Sức chứa</label>
         <input type="" name="ability" class="form-control" id="">
      </div>
      <div class="form-group">
         <label>Loại</label>
         <select name="type" class="form-control">
             <option value="1">Mặt đất</option>
             <option value="2">Trên không</option>
             <option value="3">Tình báo</option>
         </select>
      </div>
			<br>
			<button class="btn-warning btn">
				Tạo quân sự
			</button>
		</form>
	</div>
	<div class="col-lg-12">
		<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Quân sự</h4>
                  <p class="card-category"> Danh sách quân sự</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Tên quân sự
                        </th>
                        <th>
                          Thêm
                        </th>
                        <th>
                          Hành động
                        </th>
                      </tr></thead>
                      <tbody>
                      	@foreach($mili as $k=>$v)
                        <tr>
                          <td>
                            {{$v->id_m}}
                          </td>
                          <td>
                            {{$v->name_m}}
                          </td>
                          <td>
                            <a href="military/{{$v->id_m}}/param" class="btn btn-success">Thông số</a>
                            <a href="military/{{$v->id_m}}/payload" class="btn btn-warning">Tiêu thụ</a>
                          </td>
                          <td>
                            <a href="#" class="btn btn-dark">Xóa</a>
                            <a href="#" class="btn btn-danger">Sửa</a>
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
	</div>
</div>
@endsection