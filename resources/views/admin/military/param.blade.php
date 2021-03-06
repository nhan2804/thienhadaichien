@extends('admin_layout')
@section('content')
<div class="row">
	<div class="col-6">
    <a href="./payload" class="btn btn-success">Thêm chi phí?</a>
		<h3>Thêm thông số</h3>
		<form method="post" action="{{URL::to('admin/military/param')}}">
			@csrf
      <input type="hidden" name="id" value="{{$id}}" id="">
			<div class="form-group ">
				<label>Tên thông số</label>
				<select class="form-control" name="re">
            @foreach($re as $k=>$v)
            <option value="{{$v->id_resourse}}">{{$v->name_resource}}</option>
            @endforeach    
        </select>
			</div>
      <div class="form-group ">
        <label>Giá trị</label>
        <input class="form-control" type="" name="v">
      </div>
      <div class="form-group ">
        <label>% cộng thêm của thuộc tính theo hành tinh(Mặc định)</label>
        <input type="text" disabled="true" class="form-control" name="" id="">
      </div>
			<br>
			<button class="btn-warning btn">
				Thêm chỉ số này
			</button>
		</form>
	</div>
	<div class="col-lg-12">
		<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Chỉ số</h4>
                  <p class="card-category"> Chỉ số của công trình</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Nội dung
                        </th>
                        
                        <th>
                          Hành động
                        </th>

                      </tr></thead>
                      <tbody>
                      	@foreach($list as $k=>$v)
                        <tr>
                          <td>
                            {{$v->id_m}}
                          </td>
                          <td>
                            {{$v->name_resource}} + {{$v->value_m}}
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