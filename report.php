<!DOCTYPE html>
<html>
<head>
<title>Report</title>
<link rel="stylesheet" href="stylesheet/report.css">
<?php require 'dbconnection.php';?>
</head>
<body style="color:red;margin-left:30px;">
<?php 
$sql="SELECT  * FROM REPORT";
$result=$conn->query($sql);
if($result->num_rows==0)
	die("ERROR:Report cannot be retrieved from database");

	while($row=$result->fetch_assoc())
	{
	   echo $row["report"]."<br>";
	}
?>
</body>
</html>
