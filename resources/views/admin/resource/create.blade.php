@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-6">
		<h3>Tạo các đặt tính</h3>
		<form method="post" action="{{URL::to('admin/resource')}}">
			@csrf
			<div class="form-group ">
				<label>Tên thuộc tính</label>
				<input class="form-control" type="" name="name">
			</div>
			<div class="form-group">
			<label>
				<input type="checkbox" value="1" name="is_2">Thuộc tính 2
			</label>
			</div>
			<br>
			<button class="btn-warning btn">
				Tạo tài nguyên
			</button>
		</form>
	</div>
	<div class="col-lg-6">
		<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tài nguyên</h4>
                  <p class="card-category"> Danh sách tài nguyên</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Tên tài nguyên
                        </th>
                        <th>
                          Hành động
                        </th>
                      </tr></thead>
                      <tbody>
                      	@foreach($re as $k=>$v)
                        <tr>
                          <td>
                            {{$v->id_resource}}
                          </td>
                          <td>
                            {{$v->name_resource}}
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