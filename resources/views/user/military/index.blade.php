@extends('user.index')
@section('left-bar')
<ul class="p-0 list-menu">
    <li><a href="{{URL::to('dashboard/overview')}}">Tổng quan</a></li>
    <li><a href="{{URL::to('dashboard/news')}}">Tin tức</a></li>
    <li><a href="">Báo cáo</a></li>
    <li><a href="{{URL::to('dashboard/build')}}">Xây dựng công trình</a></li>
    <li><a href="{{URL::to('dashboard/military')}}">Xây dựng quân sự</a></li>
     <li><a href="{{URL::to('dashboard/research')}}">Nghiên cứu</a></li>
    <li><a href="{{URL::to('dashboard/headquarter')}}">Bộ chỉ Huy</a></li>
    <li><a href="{{URL::to('dashboard/intelligence-agencies')}}">Cơ quan tình báo</a></li>
    <li><a href="{{URL::to('dashboard/market')}}">Giao thương</a></li>
    <li><a href="#">Bộ ngoại giao</a></li>
    <li><a href="#">Bảng xếp hạng</a></li>
    <li><a href="#">Diễn đàn</a></li>
    <li><a href="#">Cài đặt</a></li>
    <li><a href="#">Thoát</a></li>
</ul>
@endsection
@section('content')
<style type="text/css">
	.fade{
		transition: all 0.3s;
	}
</style>
<div>
	<h4>QUÂN SỰ CỦA TÔI</h4>
	<div class="d-flex justify-content-end">
	    <a href="military/hide"><i class="fas fa-eye-slash"></i> Ẩn đã xong</a>
	</div>
	
	<div>
		@foreach($my_milis as $k=>$v)
		<div class="border-p mb-1">
			<div class="row">
				<div class="col-lg-4">
					<img src="https://gutta.lv/wp-content/uploads/2015/10/test-img.jpg" class="img" alt="">
				</div>
				<div class="col-8">
					<h5 class="m-0">{{$v[0]->name_m}}</h5>
					<p class="m-0">SL: {{count($v)}}</p>
					<a class="btn btn-primary btn-sm" href="military/set-status-hide/{{$v[0]->id_m}}">Nhận</a>
					<p>{{$v[0]->desc_m}}</p>
					 <div class="d-flex justify-content-end">
						<div>
						@if($v[0]->status_m==0)
							<span class="text-warning"><span data-id="{{$v[0]->id_m_u}}" data-end="{{end($v)->time_end}}" class="getting-started"></span></span>
							<span style="cursor:poiter" data-id="{{$v[0]->id_m}}" data-toggle="modal" data-target="#exampleModal" class="text-danger destroy">
							    Hủy?
							</span>
						@else
							<span class="text-success"><i class="far fa-check-circle"></i> Hoàn tất</span>
						@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<h4>XÂY DỰNG QUÂN SỰ</h4>
	<div class="d-flex justify-content-end">
	    <a href="?type=1" class="btn btn-warning mr-1"><i class="fas fa-vector-square"></i> Mặt đất</a>
	    <a href="?type=2" class="btn btn-primary mr-1"><i class="fas fa-globe-americas"></i> Trên không</a>
	    <a href="?type=3" class="btn btn-success"><i class="fas fa-user-secret"></i> Tình báo</a>
	</div>
	<div>
		@foreach($milis as $k=>$v)
		<div class="border-p mb-1">
			<div class="row">
				<div class="col-lg-4">
					<img src="https://gutta.lv/wp-content/uploads/2015/10/test-img.jpg" class="img" alt="">
				</div>
				<div class="col-8">
					<h5 class="m-0">{{$v->name_m}}</h5>
					<p class="m-0">Thời gian xây : <span class="text-primary">{{$v->time_build}}</span> phút</p>
					<p>{{$v->desc_m}}</p>
					 <div class="d-flex justify-content-end">
						<div>
						<button data-name="{{$v->name_m}}" data-id="{{$v->id_m}}" class="btn-modal" style="height: 30px;border:1px solid black;color:white;background:#3a3838" data-toggle="modal" data-target="#exampleModalCenter" >Xây dựng <i class="fas fa-archway"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
          <input type="number" min="1" value="1" placeholder="Nhập số lượng" id="num"/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" data-id="" id="btn-confirm" class="btn btn-primary">Xác nhận xây</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelok">Hủy xây</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Nhập số lượng muốn hủy</p>
       <input id="num_d" type="number"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" id="btn_d" data-id class="btn btn-primary">Hủy</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	$('.btn-modal').on('click',function(event) {
		$('.modal .modal-title').html($(this).attr('data-name'));
		let id=$(this).attr('data-id');
		$('#btn-confirm').attr('data-id',id);

	$.ajax({
		url: 'military/detail/'+id,
		type: 'GET',
	})
	.done(function(data) {
		
		// console.log("success" +data);
		// JSON.parse(data);
		$('.modal .modal-body').html(renderPay(data.pay)+renderParam(data.param));
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
		
	});
	$('#btn-confirm').on('click',function(event) {
		let id=$(this).attr('data-id');
		$.ajax({
			url: 'military/buy/'+id+'/'+$('#num').val(),
			type: 'GET',
		})
		.done(function(data) {
			console.log("success");
			// console.log(data);
			$('.modal .modal-title').html(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	$('.destroy').on('click',function(event) {
		let id=$(this).attr('data-id');
// 		let num=$('#num_d').val();
        $('#btn_d').attr('data-id',id);
		
	});
	$('#btn_d').on('click',function(event) {
		let id=$(this).attr('data-id');
		let num=$('#num_d').val();
		$.ajax({
			url: 'military/destroy',
			type: 'POST',
			data:{
			   id,
			   num
			}
		})
		.done(function(data) {
			if(data=="ok") location.reload();
			console.log(data);
			$('#exampleModalLabelok').html(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	
	function renderPay(arr) {
		let html='<ul>Cần';
		arr.forEach( function(e, i) {
			html+='<li>'+e.name_resource+' : '+e.value_m+'</li>';
		});
		html+='</ul>';
		return html;
	}
	function renderParam(arr) {
		let html='<ul>Thông số';
		arr.forEach( function(e, i) {
			html+='<li>'+e.name_resource+' + '+e.value_m+'(+% thuộc tính của hành tinh)</li>';
		});
		html+='</ul>';
		return html;
	}
</script>
<script type="text/javascript">
	function toHHMMSS (num) {
    var sec_num = parseInt(num, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
}
function run_countdown(this_,cb) {
	let d1 = new Date($('#date').val());
	let d2 = new Date(this_.data('end'));
	let time=(d2.getTime()-d1.getTime())/1000;
	let id = this_.data('id');
	let time_s=setInterval(function () {
		if(time<=0){
			this_.html('<span class="text-success"><a href="military/set-status-hide/'+id+'"><span class="text-success"><i class="far fa-check-circle"></i> Hoàn tất,Nhận?</span></a></span>');
			
			clearInterval(time_s);
			cb();
		}else{
			this_.html('<span class="text-warning">Còn lại '+(toHHMMSS(time))+'</span>')
			time--;
		}
	}, 1000)
}
</script>
<script type="text/javascript">
  // $('.getting-started').each(function(index, el) {
  // 	var $this = $(this), finalDate = $(this).data('countdown');
  // 	let id= $(this).data('id');
  	
  // 	$this.countdown(finalDate, {elapse: true})
  // 	.on('update.countdown', function(event) {
  // 	if (event.elapsed) {

  //   	$this.html(event.strftime('<span class="text-success">Xong<span>'));
  //   	// setStatus(id);
  //   	$this.countdown('pause');
  // 	} else {
  //   	$this.html(event.strftime('Đang xây,còn lại: <span>%H:%M:%S</span>'));
  //   }
  //   });
  // });
  $('.getting-started').each(function(index, el) {
  	let time= $(this).data('id');

  	run_countdown($(this),function() {
		// setStatus(time);
	},);
  });

 function setStatus(id) {
 	$.ajax({
 		url: 'military/set-status/'+id,
 		type: 'GET',
 	})
 	.done(function() {
 		console.log("success");
 		location.reload();
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});
 	
 }
</script>

@endsection