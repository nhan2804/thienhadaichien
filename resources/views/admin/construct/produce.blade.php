@extends('admin_layout')
@section('content')
<div class="row">
  <div class="col-6">
    <h3>Thêm năng xuất</h3>
    <form method="post" action="{{URL::to('admin/construction/produce')}}">
      @csrf
      <input type="hidden" name="id" value="{{$id}}" id="">
      <div class="form-group ">
        <label>Tên năng xuất</label>
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
      <div class="form-group">
         <label>Đơn vị ( /s, /h, /p, /l(lần))</label>
          <input class="form-control" type="" name="unit">
      </div>
      <br>
      <button class="btn-warning btn">
        Thêm năng xuất này
      </button>
    </form>
  </div>
  <div class="col-lg-12">
    <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Năng xuất</h4>
                  <p class="card-category">Năng xuất xây dựng xong</p>
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
                            {{$v->id_c_p}}
                          </td>
                          <td>
                            + {{$v->name_resource}} {{$v->value_p}}/{{$v->unit_p}}
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