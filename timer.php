<div>
Time remaining:
<span id="time"></span>
</div>
<script>
var timer="";
function checktime()
{
var end=<?php echo $_SESSION["endtime"];?>;
var now=new Date().getTime();
var distance=end-now;
if(distance<=0)
 {
	document.getElementById("time").style.color="red";
	document.getElementById("time").innerText="TimeOut";
	clearInterval(timer);
 }
 else
 {
	if(distance<=60000)
	document.getElementById("time").style.color="red";
var h=Math.floor(distance/3600000);
var m=Math.floor((distance%3600000)/60000);
var s=Math.floor((distance%60000)/1000);
if(m<10)
	m="0"+m;
if(s<10)
	s="0"+s;
document.getElementById("time").innerText="0"+h+":"+m+":"+s;
 }
}
checktime();
timer=setInterval(checktime,1000);	
</script>