<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Remove Book</title>
<?php require 'dbconnection.php';?>
<link rel="stylesheet" href="stylesheet/removebook.css">
</head>
<body>
<div id="menubar">
<?php require 'menu.php';?>
</div>
<?php
$sql="SELECT * FROM BOOK";
$result=$conn->query($sql);
?>
<div id="page">
<?php
while($row=$result->fetch_assoc())
{
	$imgname="../Images/".$row["imgname"];
	$name=$row["name"];
	$fileloc='../'.$row["filelocation"];
	$event="onclick=remove('".$name."')";
echo '<div class="book">';
echo '<span style="float:right" class="close" '.$event.'>X</span>';
echo '<img src='.$imgname.' alt="img">';
echo '<br>';
echo '<a href='.$fileloc.'>'.$name.'</a>';
echo '</div>';
}
?>
<form action="removebook.php" method="post" id="form">
<input type="hidden" name="book" id="book">
</form>
</div>

</body>
<script>
document.getElementById("removebook").classList.add("active");
function remove(book)
{
	document.getElementById("book").value=book;
	document.getElementById("form").submit();
}
</script>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$book=$_POST["book"];
	echo $name;
	$sql="SELECT * FROM BOOK where name='$book'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$imgname="../Images/".$row["imgname"];
	$name=$row["name"];
	$fileloc='../'.$row["filelocation"];
	
	unlink($fileloc);
	unlink($imgname);
	$sql="DELETE FROM BOOK WHERE NAME='$book'";
	$conn->query($sql);
	header("Location:removebook.php");
}
?>