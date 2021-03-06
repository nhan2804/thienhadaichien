@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-6">
		<h3>Tạo công trình</h3>
		<form method="post" action="{{URL::to('admin/construction')}}">
			@csrf
			<div class="form-group ">
				<label>Tên công trình</label>
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
			<br>
			<button class="btn-warning btn">
				Tạo công trình
			</button>
		</form>
	</div>
	<div class="col-lg-12">
		<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Công trình</h4>
                  <p class="card-category"> Danh sách công trình</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Tên công trình
                        </th>
                        <th>
                          Thêm
                        </th>
                        <th>
                          Hành động
                        </th>
                      </tr></thead>
                      <tbody>
                      	@foreach($cons as $k=>$v)
                        <tr>
                          <td>
                            {{$v->id_c}}
                          </td>
                          <td>
                            {{$v->name_c}}
                          </td>
                          <td>
                            <a href="construction/{{$v->id_c}}/produce" class="btn btn-success">Năng xuất</a>
                            <a href="construction/{{$v->id_c}}/payload" class="btn btn-warning">Tiêu thụ</a>
                            <a href="construction/{{$v->id_c}}/param" class="btn btn-info">Thông số</a>
                            <a href="construction/{{$v->id_c}}/percent" class="btn btn-primary">Tỉ lệ</a>
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