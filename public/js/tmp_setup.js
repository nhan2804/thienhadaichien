	let url="http://localhost/game/public/dashboard/setup";
	$.ajax({
		url: url,
		type: 'GET',
	})
	.done(function(data) {
		let list = data;
		
		if(sessionStorage.getItem("produce")){
		    let check= JSON.parse(sessionStorage.getItem("produce"));
		    if(check.length>0){
			list=sessionStorage.getItem("produce");
			list=JSON.parse(list);
			
		    }else{
		       
		    }
		}else{
			sessionStorage.setItem("produce", JSON.stringify(data));
		}
		let list = data;
		
		let arr = sessionStorage.getItem("produce");
		let money= $('#money').val();
		money=parseInt(money);
		let food= $('#food').val();
		food=parseInt(food);
		let uranium= $('#uranium').val();
		uranium=parseInt(uranium);
		let fuel= $('#fuel').val();
		let metal= $('#metal').val();
		let quartz= $('#quartz').val();
		list.forEach( function(e, i) {
			let n=e.name_resource;
			if(n=='Tiền'){
				setInterval(function () {
					money+=parseInt(e.value_p);
					$('#l_money').html(money);
					$('#money').val(money);
					arr = JSON.parse(arr);
					arr[i].value_p = money;
					arr=JSON.stringify(arr);
					sessionStorage.setItem("produce", arr);
				},1000)
			}else if(n=='Lương thực'){
				
			}else if(n=='Dân'){


			}else if(n=='Uranium'){
				setInterval(function () {
					uranium+=parseInt(e.value_p);
					$('#l_uranium').html(uranium);
					arr = JSON.parse(arr);
					arr[i].value_p = uranium;
					arr=JSON.stringify(arr);
					sessionStorage.setItem("produce", arr);
					$('#uranium').val(uranium);
				},1000)

			}
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});