<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|Home</title>
<link rel="stylesheet" href="stylesheet/dashb.css">
<?php require 'dbconnection.php'?>
</head>
<body>
<div id="menu">
<?php require 'menu.php';?>
</div>

<?php 

$ans=$_POST["ans"];
$ans = explode(',', $ans);
$counter=0;
$sql="SELECT  * FROM QUESTION";
$result=$conn->query($sql);
if($result->num_rows==0)
	die("ERROR:Question cannot be retrieved from database");
$counter=0;
	while($row=$result->fetch_assoc())
{
	  if($row["ans"]==$ans[$counter])
		  $ans[$counter]=1;
	  else
		  $ans[$counter]=0;
	   

++$counter;
}
$comp=($ans[0]+$ans[1]+$ans[2]+$ans[3])/4*100;
$electric=($ans[4]+$ans[5]+$ans[6])/3*100;
$mech=($ans[7]+$ans[8]+$ans[9])/3*100;
$commerce=($ans[10]+$ans[11]+$ans[12]+$ans[13]+$ans[14]+$ans[15]+$ans[16]+$ans[17]+$ans[18]+$ans[19])/10*100;
$med=($ans[20]+$ans[21]+$ans[22]+$ans[23]+$ans[24]+$ans[25]+$ans[26]+$ans[27]+$ans[28]+$ans[29])/10*100;
?>

<div id="result" style="text-align:center;margin-top:200px;border:1px solid black;width:500px;padding:15px;border-radius:12px;margin-left:420px;background-image: linear-gradient(to bottom right, #333, #1A5276);color:white;">
<h1>Result</h1>
<span>Computer:<?php echo $comp;?></span><br>
<span>Electrical:<?php echo $electric;?></span><br>
<span>Mechanical:<?php echo $mech;?></span><br>
<span>Commerce:<?php echo $commerce;?></span><br>
<span>Medicine:<?php echo $med;?></span><br>
</div>
</body>
<script>
document.getElementById("test").classList.add("active");
</script>
</html>
