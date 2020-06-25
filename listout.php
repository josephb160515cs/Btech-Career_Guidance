<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|List</title>
<?php require 'dbconnection.php'?>
<link rel="stylesheet" href="stylesheet/listout.css">
<?php 
$sql="SELECT  * FROM COLLEGE";
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
 while($row=$result->fetch_assoc())
{
	echo '<tr>';
	echo '<th>'.$row["id"].'</th>';
	echo '<th>'.$row["college"].'</th>';
	echo '<th>'.$row["course"].'</th>';
	echo '<th>'.$row["field"].'</th>';
	echo '<th>'.$row["degree"].'</th>';
	echo '<th>'.$row["10eli"].'</th>';
	echo '<th>'.$row["12eli"].'</th>';
	echo '<th>'.$row["location"].'</th>';
	echo '<th>'.$row["email"].'</th>';
	echo '<th>'.$row["phno"].'</th>';
	echo '</tr>';
}
?>
</table>
</div>
</body>
<script>
document.getElementById("list").classList.add("active");
</script>
</html>