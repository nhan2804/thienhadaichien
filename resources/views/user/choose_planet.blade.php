<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<style type="text/css">

		.card_cus img{
			height: 100px;
			max-height: 160px;
		}
		.card_cus{
			transition: all 0.4s;
			cursor: pointer;
			border-radius: unset;
			/*position: relative;*/
		}
		.card_cus:hover{
			transform: scale(1.03);
		}
		/*.desc_planet{
			width: 200px;
			height: 20px;
			background: red;
			left: 100%;
			padding: 4px 8px;
			top: 50%;
			position: absolute;
		}*/
		.btn_pri{
			outline: none;
			padding: 8px 12px;
			background: none;
			color: white;
			background: black;
			font-size: 1.2rem;
			border: 2px solid white;
			line-height: 1.2rem;
		}
		#a{
			background: white;
			border-radius: 4px;
		}
		.active{
			border: 4px solid #092EE8;
		}
		.list_attr{
			list-style-type: decimal;
		}
	</style>
</head>
<body style="background: url(https://exoplanets.nasa.gov/internal_resources/1806);">
	<div class="container m-10">
		<h1 class="text-center text-light">
			CHỌN HÀNH TINH
		</h1>
		<div class="text-center">
			<input id="ip_name" style="outline: none" type="text" placeholder="Nhập tên nhân vật" name="">
		</div>
		<br>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="row">
		@foreach($cate as $k=>$v)

			<div class="col-lg-4 col-6 mb-4">
				<a href="user/choose-planet/{{$v->id_cate_p}}">
				<div data-id="{{$v->id_cate_p}}" class="card card_cus">
					<div class="desc_planet"></div>
				  <img class="card-img-top" src="https://gutta.lv/wp-content/uploads/2015/10/test-img.jpg" alt="Card image cap">
				  <div class="card-body">
				  	<h5 class="card-title">{{$v->name_planet}}</h5>
				  	<h6 class="card-subtitle mb-2 text-muted">{{$v->name_cate}}</h6>
				  </div>
				</div>
				</a>
			</div>
		@endforeach
	</div>
		</div>
		<div class="col-3">
				<div id="a"></div>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-center">
		<form method="post" action="dashboard/user/choose-planet">
			@csrf
			<input type="hidden" id="id" name="id">
			<input type="hidden"  id="name" name="name">
			<button class="btn_pri">Tạo mới</button>
		</form>
	</div>
	
</body>
<script type="text/javascript">
	$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
	$('.card_cus').on('click',  function(event) {
		event.preventDefault();
		$('.card_cus').removeClass('active');
		$(this).addClass('active');
		$('#id').val($(this).attr('data-id'));
		$.post('{{URL::to('dashboard/user/planet')}}',{id:$(this).attr('data-id')}, data=> {
		  $('#a').html(renderAttr(data));
		});
	});
	$('#ip_name').on('keyup',function(event) {
		event.preventDefault();
		$('#name').val($(this).val());
	});

	function renderAttr(arr) {
		let html='<ul class="list_attr">Thuộc tính hành tinh';
		arr.forEach( function(e, index) {
			html+='<li>'+e.name_resource+ ' : '+ e.value +' %</li>';
		});
		return html+='</ul>';
	}
</script>
</html>