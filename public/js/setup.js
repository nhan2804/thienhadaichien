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
	let d1 = new Date(this_.data('start'));
	let d2 = new Date(this_.data('end'));
	let time=(d2.getTime()-d1.getTime())/1000;

	let time_s=setInterval(function () {
		if(time<=0){
			this_.text("Xong");
			cb();
			clearInterval(time_s);
		}else{
			this_.text('<span class=text-warning">Còn lại '+(toHHMMSS(time))+'</span>')
			time--;
		}
	}, 1000)
}