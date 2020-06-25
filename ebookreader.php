<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|E-book</title>
<link rel="stylesheet" href="stylesheet/ebookreader.css">
<?php require 'dbconnection.php'?>
</head>
<body>
<div id="menu">
<?php require 'menu.php';?>
</div>
<?php
$sql="SELECT * FROM BOOK";
$result=$conn->query($sql);
?>
<div id="page">
<br>
<?php
while($row=$result->fetch_assoc())
{
	$imgname="Images/".$row["imgname"];
	$name=$row["name"];
	$fileloc=$row["filelocation"];
echo '<div class="book">';
echo '<a href='.$fileloc.'><img src='.$imgname.' alt="img">';
echo '<br>';
echo $name.'</a>';
echo '</div>';
}
?>
</div>
</body>
<script>
document.getElementById("ebook").classList.add("active");
</script>
</html>