@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/headquarter/expeditionary-army')}}">Quân viễn chinh</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/defense')}}">Phòng thủ công trình</a></li>
    <li><a href="{{URL::to('dashboard/headquarter/colony')}}">Trạm thuộc địa</a></li>
</ul>
@endsection
@section('content')
	@yield('content')
	<h4>MỤC TIÊU / TẤN CÔNG</h4>
	<div>
        <input type="text">
        <button>Tấn công thần tốc</button>
	</div>
   
	@foreach($cons as $k=>$v)
		<div class="border-p mb-1">
			<div class="row">
				<div class="col-lg-4">
					<img src="https://gutta.lv/wp-content/uploads/2015/10/test-img.jpg" class="img" alt="">
				</div>
				<div class="col-8">
					<h5 class="m-0">{{$v->name_c}} : {{$v->quantity}}</h5>
					<p>{{$v->desc_c}}</p>
					<div class="d-flex justify-content-end mb-1">
						
					</div>

					 <div class="d-flex justify-content-end">
						<div>
							
							<button data-id="{{$v->id_c}}"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-view">Xem chi tiết</button>
							<button data-id="{{$v->id_c}}"  data-user="{{$v->id_user_c}}" class="btn-attack btn-modal btn btn-warning"  data-toggle="modal" data-target="#exampleModalCenter">Tấn công</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Chi tiết lính</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body" id="detail-body">
		  
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		</div>
	  </div>
	</div>
  </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLongTitle">Thêm lính để tấn công công trình này</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form id="submit">
			
		<div class="modal-body" id="render-body">
		  
		</div>
		<div class="d-flex justify-content-end">
		</div>
		
		<div class="modal-footer">
			<input type="hidden" value="1" id="id_c_input" name="id_c">
			<input type="hidden" value="1" id="id_u_input" name="id_user_attacked">
			
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
		  <button type="submit" data-id="" id="btn-confirm" class="btn btn-primary">Tấn Công</button>
		</div>
  
		</form>
	  </div>
	</div>
  </div>
  <script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	$('.btn-view').on('click',function(event) {
		event.preventDefault();

		$.ajax({
           type: "POST",
           url: "defense/detail",
           data:{
           	id:$(this).data('id')
           },
           success: function(data)
           {
               $('#detail-body').html(render2(data));
           },
           error: function (argument) {
           	alert("Coming soon...")
           }
         });
		
	});
	$('#submit').on('submit', function(event) {
		
		let form = $(this);
		 $.ajax({
           type: "POST",
           url: "insert",
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               // alert(data); // show response from the php script.
               location.reload();
           }
         });
         event.preventDefault();
	});
	$('.btn-attack').on('click', function(event) {
		$('#id_c_input').val($(this).data('id'));
		$('#id_u_input').val($(this).data('user'));
		$.ajax({
		url: '../headquarter/add',
		type: 'POST',
		data: {id: $(this).data('id')},
		})
		.done(function(d) {
			// console.log(render(d));
			$('#render-body').html(render(d));
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	function render(arr) {
		let html='';
		arr.forEach( function(e, i) {
			
			let input = `<div><label>${e.name_m}</label>:${e.quantity}<input type="number" min="1" max="${e.quantity}" name="${e.id_m}"></div>`;
			html+=input;
		});
		return html;
	}
	function render2(arr) {
		let html='';
		arr.forEach( function(e, i) {
			
			let input = `<div><label>${e.name_m}</label>:${e.quantity}</div>`;
			html+=input;
		});
		return html;
	}

	
	
</script>
@endsection

