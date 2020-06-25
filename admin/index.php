<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<?php require 'dbconnection.php';?>
<link rel="stylesheet" href="stylesheet/index.css">
<script>
function fun()
{
document.getElementById("msg").style.color="red";
}
</script>
</head>
<body>
<div id="div1">
<small id="msg">incorrect credentials</small>
<form action="index.php" method="post">
<p>USERNAME:  <input type="text" name="username" autocomplete="on" autofocus></p>
<p>PASSWORD:  <input type="password" name="password"></p>

<input type="submit" value="Login" style="float:center" class="submit">
</form>
</div>
</body>
</html>
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$password="";
$username=$_POST['username'];
$password=$_POST['password'];


$result=mysqli_query($conn,"select * from admin where username='$username' and password='$password'");
if(mysqli_num_rows($result) == 0)
{
	printf('<script type="text/javascript">fun()</script>');
}
else
{
	$_SESSION["admin"]=$username;
	$msg=$username." logged in at ".date("l jS \of F Y h:i:s A");
$sql="INSERT INTO REPORT (REPORT) VALUES ('$msg')";
if($conn->query($sql))
	header("Location: removeuser.php");
}
}
?>