<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/common.css')}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous"></script>
	<style>
	    .icon_home{
	        font-size:1.4rem;
	    }
	    body{
	        font-size:1.2rem;
	       font-family: 'Roboto', sans-serif;
	       font-weight:300;
	    }
	    .list_img{
	        font-size:1rem;
	    }
	</style>
</head>
<body>
	<div class="header">
	<header class="d-flex justify-content-between align-items-center">
		<div class="d-flex">
			<div>
				<img class="img" src="https://gutta.lv/wp-content/uploads/2015/10/test-img.jpg" alt="">
			</div>
			<div class="ml-2">
				<div>
					<img class="lang" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/1200px-Flag_of_Vietnam.svg.png" alt="">
					<img class="lang" src="https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png" alt="">
				</div>
			</div>
		</div>
		<input type="hidden" value="{{$date}}" id="date" name="">
		<div style="flex: 2;margin-top: 36px">
			<div>
				<ul class="list_img">
				    <li>
				    	<i class="fas fa-users icon_home"></i>
				    	<p id="l_farmer" class="m-0">{{$i->farmer}}</p>
				    	<p  class="m-0">/{{$i->max_farmer}}</p>
				    	<p >Dân</p>
				    </li>
				    <li>
				    	<i style="color:yellow" class="fas fa-coins icon_home"></i>
				    	<p id="l_money" class="m-0">{{$i->money}}</p>
				    	
				    	<p >Money</p>
				    </li>
				    <li>
				    	<i  style="color:green" class="fas fa-hamburger icon_home"></i>
				    	<p id="l_food" class="m-0">{{$i->food}}</p>
				    	<p  class="m-0">/{{$i->max_food}}</p>
				    	<p>Lương Thực</p>
				    </li>
				    <li>
				    	<i  style="color:gray" class="fas fa-adjust icon_home"></i>
				    	<p id="l_metal" class="m-0">{{$i->metal}}</p>
				    	<p  class="m-0">/{{$i->max_metal}}</p>
				    	<p>Kim Loại</p>
				    </li>
				    <li>
				    	<i  style="color:blue" class="fas fa-atom icon_home"></i>
				    	<p id="l_quartz" class="m-0">{{$i->quartz}}</p>
				    	<p  class="m-0">/{{$i->max_quartz}}</p>
				    	<p>Thạch Anh</p>
				    </li>
				    <li>
				    	<i  style="color:orange" class="fas fa-thermometer-full icon_home"></i>
				    	<p id="l_fuel" class="m-0">{{$i->fuel}}</p>
				    	<p class="m-0">/{{$i->max_fuel}}</p>
				    	<p>Nhiên Liệu</p>
				    </li>
				    <li>
				    	<i  style="color:#4c9d3a" class="fas fa-radiation-alt icon_home"></i>
				    	<p id="l_uranium" class="m-0">{{$i->uranium}}</p>
				    	<p  class="m-0">/{{$i->max_uranium}}</p>
				    	<p >Uranium</p>
				    </li>
				</ul>
			</div>
		</div>
		<div style="margin-top: 30px">
			<div>
				<img style="width:160px" class="img" src="http://cdn.onlinewebfonts.com/svg/img_568656.png" alt="">
			</div>

			<p class="text-center color-weight option">
				<p class="text-center">{{$user->fullname}}</p>
				<div class="text-center">
				<a href="#" class="mr-1">Cấp bậc</a>
				<a id="clear" href="{{URL::to('logout')}}">Thoát</a>
				</div>
			
			</p>
		</div>
		
	</header>
	<main>
		<a href="#" onclick="history.back()" class="color-weight"><i class="fas fa-arrow-left"></i> Trở về</a>
		<div class="row">
			<div class="col-lg-2">
				<div>
				@yield('left-bar')
				</div>
			</div>
			<div class="col-lg-8">
				<div>
					<a href="{{URL::to('dashboard/setup')}}" class="btn btn-success"><i class="fas fa-plus"></i> Thu nguyên liệu</a>
				@yield('content')
				</div>
			</div>
			<div class="col-lg-2">
				
			</div>
		</div>
	</main>
	</div>
	<footer>


		<input type="hidden" value="{{$i->money}}" id="money" name="">
		<input type="hidden" value="{{$i->metal}}" id="metal" name="">
		<input type="hidden" value="{{$i->food}}" id="food" name="">
		<input type="hidden" value="{{$i->fuel}}" id="fuel" name="">
		<input type="hidden" value="{{$i->uranium}}" id="uranium" name="">
		<input type="hidden" value="{{$i->quartz}}" id="quartz" name="">
		<input type="hidden" value="{{$i->farmer}}" id="farmer" name="">
		
			<input type="hidden" value="{{$i->max_money}}" id="max_money" name="">
			<input type="hidden" value="{{$i->max_metal}}" id="max_metal" name="">
		<input type="hidden" value="{{$i->max_food}}" id="max_food" name="">
		<input type="hidden" value="{{$i->max_fuel}}" id="max_fuel" name="">
		<input type="hidden" value="{{$i->max_uranium}}" id="max_uranium" name="">
		<input type="hidden" value="{{$i->max_quartz}}" id="max_quartz" name="">
		<input type="hidden" value="{{$i->max_farmer}}" id="max_farmer" name="">
		
	</footer>
</body>
<script type="text/javascript">
	$("#clear").on('click',  function(event) {
		localStorage.clear();
		
	});
</script>
<script src="{{asset('js/setup.js?v=2.4')}}"></script>
</html>