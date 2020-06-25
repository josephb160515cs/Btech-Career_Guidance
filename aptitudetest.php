<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|Test</title>
<link rel="stylesheet" href="stylesheet/aptitudetest.css">
<?php require 'dbconnection.php'?>
</head>
<body>
<div id="menu">
<?php require 'menu.php';?>
</div>

<div id="page">
<div id="guidelines">
<h1>Guidelines for examination</h1>
<ul >
<li>* Any form of malpratice is not entertained</li><br>
<li>* The exam has a 30 questions each with 1 marks</li><br>
<li>* The final candiate selection will be on the discretion of hr</li><br>
<li>* Candidates shall remain seated till end of examination</li><br>
<li>* Chief Presiding Officer has authority to assign seats to candidates</li><br>
<li>* Candidates shall not use keyboard during the duration of exams.</li><br>
<li>* The max time for exam is 30min</li><br>
<li>* For each wrongly answered question no marks will be deducted</li><br>
<li>* Doubts during examination will not be entertained</li><br>
</ul>
</div>
<form action="aptitudetest.php" method="post">
<input type="submit" value="Start Test">
</form>
</div>
</body>
<script>
document.getElementById("test").classList.add("active");
</script>
</html>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$_SESSION["endtime"]=(time()+0 +30*60 +0*60*60 )*1000;
	header("Location:questions.php");
}
?>