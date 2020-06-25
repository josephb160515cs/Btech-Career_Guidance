<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="stylesheet/register.css">
<?php require 'dbconnection.php';?>
</head>
<body>
<div id="div1">
<form action="register.php" method="post">
<table>
<tr>
<td><p>USERNAME:  </p></td>
<td><input type="text" name="username" autofocus required></td>
</tr>
<tr>
<td><p>PASSWORD:  </p></td>
<td><input type="password" name="password" required></td>
</tr>
<tr>
<td><p>EMAIL:	</p></td>
<td><input type="email" name="email" required></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Register" class="submit"></td>
</tr>
</table>
</form>
</div>
</body>
</html>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$password="";
$email="";
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];


$sql="INSERT INTO STUDENT (USERNAME,PASSWORD,EMAIL) VALUES ('$username','$password','$email')";
if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
} else {
    header("Location:register.php");
}
}
?>