@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/headquarter/army')}}">Quân viễn chinh</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/defense')}}">Phòng thủ công trình</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Trạm thuộc địa</a></li>
</ul>
@endsection
@section('content')
	@yield('content')
	<h4>MỤC TIÊU</h4>
	<div>
        <input type="text">
        <button>Tấn công thần tốc</button>
	</div>
    <table class="table table-dark">
        <thead>
            <tr>
              <th scope="col">#ID</th>
              <th scope="col">Tên</th>
              <th scope="col">Location</th>
              <th scope="col">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $k=>$v)
            <tr>
                
              <th scope="row">{{$v->id}}</th>
              <td>{{$v->name}}</td>
              <td>{{$v->location}}</td>
              <td><a href="attack/{{$v->name}}?id={{$v->id}}">Tấn công</a></td>
              
            </tr>
            @endforeach
          </tbody>
    </table>
	<div class="d-flex justify-content-end">
		<a class="btn btn-secondary" href="">ĐI ĐẾN</a>
	</div>
<div>
</div>
@endsection