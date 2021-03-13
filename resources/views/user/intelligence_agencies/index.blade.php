@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/headquarter/expeditionary-army')}}">Do thám quỹ đạo</a></li>
    <li><a data-toggle="modal" data-target="#trainspyModal" href="#">Đào tạo trinh thám</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Đào tạo phản gián</a></li>
</ul>
@endsection
@section('content')
	<h4>CƠ QUAN TÌNH BÁO</h4>
	<div>
		<table border style="width: 100%;text-align: center;">
			<thead>
				<td>Hành tinh</td>
				<td>Thủ lĩnh</td>
				<td>Tọa độ</td>
				<td>Liên minh</td>
				<td><i class="fas fa-eye"></i></td>
				<td><i class="fas fa-user-secret"></i></td>
			</thead>
            <tbody>
                @foreach($my_milis as $k => $v)
                <tr>
                    <td>Gold Gate</td>
                    <td>{{$v->fullname}}</td>
                    <td>{{$v->location}}</td>
                    <td>OMG</td>
                    <td>{{$v->plane}}</td>
                    <td>{{$v->spy}}</td>
                </tr>
                @endforeach

            </tbody>
		</table>
	</div>
	<div class="d-flex justify-content-end">
		<a href="#">Xem thêm</a>
	</div>
<div>
</div>
<div class="modal fade" id="trainspyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{URL::to('dashboard/intelligence-agencies')}}">
            @csrf
        <div class="modal-body">
            Tọa độ: <input name="loca"/><br>
            Số lượng: <input name="quantity"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Đào tạo</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
