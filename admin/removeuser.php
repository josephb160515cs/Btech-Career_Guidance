<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<?php require 'dbconnection.php';?>
<title>Remove User</title>
<link rel="stylesheet" href="stylesheet/removeuser.css">
</head>
<script>
function remove(id)
{
	document.getElementById("id").value=id;
	document.getElementById("form").submit();
}
</script>
<body>
<div id="menubar">
<?php require 'menu.php';?>
</div>
<div id="page">
<ul>
<?php 
$sql="SELECT * FROM STUDENT";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
		$html=$row["id"];
	   echo "<li>";
	   echo $row["username"];
	   echo '<span onclick="remove('.$html.')" style="float:right">X</span>';
	   echo "</li>";
}
?>
</ul>
<form action="removeuser.php" method="post" id="form">
<input type="hidden" name="id" id="id">
</form>
</div>
</body>
<script>
document.getElementById("removeuser").classList.add("active");
</script>
</html>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$id=$_POST["id"];
	$sql="DELETE FROM STUDENT WHERE id='$id'";
	if($conn->query($sql))
		header("Location:removeuser.php");
}
?>