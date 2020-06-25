<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<?php require 'dbconnection.php';?>
<title>Add Course</title>
<link rel="stylesheet" href="stylesheet/addcourse.css">
</head>
<body>
<div id="menubar">
<?php require 'menu.php';?>
</div>
<div id="page">
<form action="addcourse.php" method="post">
<table>
<tr>
<td>College:</td><td><input type="text" name="college"></td><br>
</tr>
<tr>
<td>Course:</td><td><input type="text" name="course"></td><br>
</tr>
<tr>
<td>Field:</td><td><select name="field" >
<option>ENGINEERING</option>
<option>MEDICINE</option>
<option>COMMERECE</option>
</select></td><br>
</tr>
<tr>
<td>Degree:</td><td><select name="degree">
<option>UG</option>
<option>PG</option>
</select></td><br>
</tr>
<tr>
<td>10<sup>th</sup>eligiblity:</td><td><input type="text" name="10eli"></td><br>
</tr>
<tr>
<td>12<sup>th</sup>eligiblity:</td><td><input type="text" name="12eli"></td><br>
</tr>
<tr>
<td>Location:</td><td><input type="text" name="location"></td><br>
</tr>
<tr>
<td>Email:</td><td><input type="email" name="email"></td><br>
</tr>
<tr>
<td>Phno:</td><td><input type="text" name="phno"></td><br>
</tr>
<tr>
<td></td><td><input type="submit" value="Submit"></td>
</tr>
</table>
</form>
</div>
</body>
<script>
document.getElementById("addcourse").classList.add("active");
</script>
</html>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$college=$_POST["college"];
	$course=$_POST["course"];
	$field=$_POST["field"];
	$degree=$_POST["degree"];
	$eli10=$_POST["10eli"];
	$eli12=$_POST["12eli"];
	$location=$_POST["location"];
	$email=$_POST["email"];
	$phno=$_POST["phno"];
	$sql="INSERT INTO COLLEGE (COLLEGE,COURSE,FIELD,DEGREE,10ELI,12ELI,LOCATION,EMAIL,PHNO) VALUES ('$college','$course','$field','$degree','$eli10','$eli12','$location','$email','$phno')";
	if($conn->query($sql))
	{
		echo'<script>alert("Course inserted");</script>';
	}
	else
	header("Location:addcourse.php");
}
?>