@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-6">
		<h3>Tạo nghiên cứu</h3>
		<form method="post" action="{{URL::to('admin/research')}}">
			@csrf
			<div class="form-group ">
				<label>Tên nguyên cứu</label>
				<input class="form-control" type="" name="name">
			</div>
			<div class="form-group">
			   <label>Thời gian xây dựng(phút)</label>
          <input class="form-control" type="" name="time">
			</div>
      <div class="form-group">
         <label>Giá trị(bằng số)</label>
         <input type="" name="v" class="form-control" id="">
      </div>
      <div class="form-group">
         <label>Miêu tả</label>
         <input type="" name="desc" class="form-control" id="">
      </div>
      <div class="form-group">
         <label>Tên tài nguyên được cộng tương ứng</label>
         <select name="type" class="form-control">
             
             @foreach($cate as $k=>$v)
             <option value="{{$v->id_resourse}}">{{$v->name_resource}}</option>
             @endforeach
         </select>
      </div>
			<br>
			<button class="btn-warning btn">
				Tạo nghiên cứu
			</button>
		</form>
	</div>
	<div class="col-lg-12">
		<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Nghiên cứu</h4>
                  <p class="card-category"> Danh sách nghiên cứu</p>
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
                      	@foreach([] as $k=>$v)
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