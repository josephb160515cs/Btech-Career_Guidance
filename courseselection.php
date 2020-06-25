<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>CareerSolutions</title>
<link rel="stylesheet" href="stylesheet/courseselection.css">
<script>
function showmed()
{
	var element=document.getElementById("divmed");
	if(element.style.display == '' || element.style.display == 'none'){
        element.style.display = 'block';
   }
   else {
        element.style.display = 'none';
   }
	
}
function showeng()
{
	var element=document.getElementById("diveng");
	if(element.style.display == '' || element.style.display == 'none'){
        element.style.display = 'block';
   }
   else {
        element.style.display = 'none';
   }
}
function showcom()
{
	var element=document.getElementById("divcom");
	if(element.style.display == '' || element.style.display == 'none'){
        element.style.display = 'block';
   }
   else {
        element.style.display = 'none';
   }
}
</script>
</head>
<body>
<div id="menu">
<?php require 'menu.php';?>
</div>
<div id="page">
<button type="button" id="medicine" onclick="showmed()">Medicine</button>
<button type="button" id="engineering"onclick="showeng()">Engineering</button>
<button type="button" id="commerce"onclick="showcom()">Commerce</button>
</div>
<div id="divmed">
<form action="courseselection.php" method="post">
<p><select name="meddegree">
<option value="UG">UG</option>
<option value="PG">PG</option>
</select></p>
<input type="submit" value="Go">
</form>
</div>
<div id="diveng">
<form action="courseselection.php" method="post">
<p><select name="engdegree">
<option value="UG">UG</option>
<option value="PG">PG</option>
</select></p>
<input type="submit" value="Go">
</form>
</div>
<div id="divcom">
<form action="courseselection.php" method="post">
<p><select name="comdegree">
<option value="UG">UG</option>
<option value="PG">PG</option>
</select></p>
<input type="submit" value="Go">
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
	if(isset($_POST["meddegree"]))
	{
		$_SESSION["course"]="medicine";
		$_SESSION["degree"]=$_POST["meddegree"];
	}
	if(isset($_POST["engdegree"]))
	{
		$_SESSION["course"]="engineering";
		$_SESSION["degree"]=$_POST["engdegree"];
	}
	if(isset($_POST["comdegree"]))
	{
		$_SESSION["course"]="commerce";
		$_SESSION["degree"]=$_POST["comdegree"];
	}
	header("Location:viewcollege.php");
} 
?>