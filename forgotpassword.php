<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="stylesheet/forgotpassword.css">
<?php require 'dbconnection.php'?>
</head>
<body>
<div id="div1">
<small><sup>*</sup>The account crenditials will be sent to the registered account</small>
<form action="forgotpassword.php" method="post">
<p>Registered Email:	<input type="email" name="email" required></p>
<input type="submit" value="Send Mail" class="submit">
</form>
</div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$mailid=$_POST["email"];
	$sql="SELECT * FROM STUDENT where EMAIL='$mailid'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$password=$row["password"];

ini_set("SMTP","	mail.google.com");
ini_set("smtp_port","25");
ini_set('sendmail_from', 'joseph@mail.project.com');
	mail($mailid,"Forgot Password",$password);
}
?>