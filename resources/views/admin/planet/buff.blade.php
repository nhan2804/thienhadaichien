@extends('admin_layout')
@section('content')
<div class="row">
<div class="col-6">
    <h3>Thêm buff các đặt tính</h3>
    <form method="post" action="{{URL::to('admin/planet/buff')}}">
      @csrf
      <input type="hidden" value="{{$id}}" name="id_pl">
      <div class="form-group">
      <label>Loại thuộc tính muốn buff</label>
        <select name="id_re" class="form-control">

          @foreach($cate as $k=>$v)

          <option value="{{$v->id_resourse}}">{{$v->name_resource}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Giá trị ( số nguyên), giảm thì âm tăng thì dương</label>
        <input type="" class="form-control" name="v">
      </div>
      <div class="form-group">
        <label>Miêu tả thêm</label>
        <input type="" class="form-control" name="desc">
      </div>
      <br>
      <button class="btn-warning btn">
        Tạo thuộc tính cho hành tinh này
      </button>
    </form>
  </div>
  <div class="col-12">
<div class="card">
  <div class="card-header card-header-primary">
    <h4 class="card-title ">Buff</h4>
    <p class="card-category"> Danh sách các đặt tính buff của hành tinh này</p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead class=" text-primary">
          <tr><th>
            ID
          </th>
          <th>
            Tên đặt tính
          </th>
          <th>
            Giá trị
          </th>
          <th>
            Hành động
          </th>
        </tr></thead>
        <tbody>
        	@foreach($buff as $k=>$v)
          <tr>
            <td>
              {{$v->id_buff_a}}
            </td>
            
            <td>
              {{$v->name_resource}}
            </td>
            <td>
              {{$v->value}}
            </td>
            <td>
              <a href="" class="btn btn-dark">Xóa</a>
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