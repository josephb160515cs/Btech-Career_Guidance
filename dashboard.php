<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|Home</title>
<link rel="stylesheet" href="stylesheet/dashb.css">
</head>
<body>
<div id="menu">
<?php require 'menu.php';?>
</div>

<div id="page">
<form action="dashboard.php" method="post">
<p>10<sup>th</sup> Mark: <input type="text" name="mark10"></p>
<p>12<sup>th</sup> Mark: <input type="text" name="mark12"></p>
<p><select name="caste">
  <option value="SC/ST">SC/ST</option>
  <option value="OBC">OBC</option>
  <option value="OEC">OEC</option>
  <option value="General">General</option>
</select></p>
<input type="submit" value="submit">
</form>
</div>
</body>
<script>
document.getElementById("home").classList.add("active");
</script>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$_SESSION["mark10"]=$_POST["mark10"];
	$_SESSION["mark12"]=$_POST["mark12"];
	$_SESSION["caste"]=$_POST["caste"];
	
	header("Location:courseselection.php");
}
?>