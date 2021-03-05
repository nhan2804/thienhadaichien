@extends('admin_layout')
@section('content')
<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Hành tinh</h4>
                  <p class="card-category"> Danh sách loại của hành tih</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          ID
                        </th>
                        <th>
                          Loại hành tinh
                        </th>
                        <th>
                          Hành động
                        </th>
                      </tr></thead>
                      <tbody>
                      	@foreach($cate as $k=>$v)
                        <tr>
                          <td>
                            {{$v->id_cate_p}}
                          </td>
                          <td>
                            {{$v->name_cate}}
                          </td>
                          <td>
                            <a href="" class="btn btn-dark">Xóa</a>
                            <a href="#" class="btn btn-danger">Sửa</a>
                            <a href="planet/buff/{{$v->id_cate_p}}" class="btn btn-success">Danh sách thuộc tính</a>
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection