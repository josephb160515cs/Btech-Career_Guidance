<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|List</title>
<?php require 'dbconnection.php'?>
<link rel="stylesheet" href="stylesheet/listout.css">
<?php 
$eli10=$_SESSION["mark10"];
	$eli12=$_SESSION["mark12"];
	$caste=$_SESSION["caste"];
	$course=$_SESSION["course"];
	$deg=$_SESSION["degree"];
$sql="SELECT  * FROM COLLEGE WHERE FIELD='$course' AND DEGREE='$deg' AND 10ELI<='$eli10' AND 12ELI<='$eli12'";
$result=$conn->query($sql);
?>
</head>
<body>
<div id="menu">
<?php require 'menu.php';?>
</div>

<div id="page">
<table cellspacing="0" id="Table">
<tr>
<th>Slno</th>
<th>COLLEGE</th>
<th>COURSE</th>
<th>FIELD</th>
<th>DEGREE</th>
<th>10<sup>th</sup>ELIGIBLTITY</th>
<th>12<sup>th</sup>ELIGIBLTITY</th>
<th>LOCATION</th>
<th>EMAIL</th>
<th>Phno</th>
</tr>
<?php
$counter=1;
 while($row=$result->fetch_assoc())
{
	$e10=$row["10eli"];
	$e12=$row["12eli"];
	if($caste=="SC/ST")
	{
		$e10=$e10*.7;
		$e12=$e12*.7;
	}
	if($caste=="OBC")
	{
		$e10=$e10*.8;
		$e12=$e12*.8;
	}
	if($caste=="OEC")
	{
		$e10=$e10*.9;
		$e12=$e12*.9;
	}
		
	echo '<tr>';
	echo '<th>'.$counter.'</th>';
	echo '<th>'.$row["college"].'</th>';
	echo '<th>'.$row["course"].'</th>';
	echo '<th>'.$row["field"].'</th>';
	echo '<th>'.$row["degree"].'</th>';
	echo '<th>'.$e10.'</th>';
	echo '<th>'.$e12.'</th>';
	echo '<th>'.$row["location"].'</th>';
	echo '<th>'.$row["email"].'</th>';
	echo '<th>'.$row["phno"].'</th>';
	echo '</tr>';
	++$counter;
}
?>
</table>
</div>
</body>
<script>
document.getElementById("home").classList.add("active");
</script>
</html>