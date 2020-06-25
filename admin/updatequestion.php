<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<?php require 'dbconnection.php';?>
<title>Update Question</title>
<link rel="stylesheet" href="stylesheet/updatequestion.css">
</head>
<script>
var qno=1;
</script>
<?php 
$sql="SELECT  * FROM QUESTION";
$result=$conn->query($sql);
if($result->num_rows==0)
	die("ERROR:Question cannot be retrieved from database");
$counter=0;
echo '<script> var question=[];var optiona=[];var optionb=[];var optionc=[];var optiond=[];var ans=[];';
	while($row=$result->fetch_assoc())
{
	   echo 'question['.$counter.']="'.$row["question"].'";';
	   echo 'optiona['.$counter.']="'.$row["1"].'";';
	   echo 'optionb['.$counter.']="'.$row["2"].'";';
	   echo 'optionc['.$counter.']="'.$row["3"].'";';
	   echo 'optiond['.$counter.']="'.$row["4"].'";';
	   echo 'ans['.$counter.']="'.$row["ans"].'";';
++$counter;
}
echo '</script>';
?>

<body>
<div id="menubar">
<?php require 'menu.php';?>
</div>
<div id="page">
<form action="updatequestion.php" method="post">
<table>
<tr>
<td>QNO:</td><td><select name="qno" id="qno" onchange="showcurrentq()">
<?php 
$c=1;
while($c<=30)
echo'<option>'.$c++.'</option>';
?>
</select></td><br>
</tr>

<tr>
<td>Question:</td><td><input type="text" name="question" id="question"></td><br>
</tr>
<tr>
<td>A:</td><td><input type="text" name="a" id="a"></td><br>
</tr>
<tr>
<td>B:</td><td><input type="text" name="b" id="b"></td><br>
</tr>
<tr>
<td>C:</td><td><input type="text" name="c" id="c"></td><br>
</tr>
<tr>
<td>D:</td><td><input type="text" name="d" id="d"></td><br>
</tr>
<tr>
<td>Ans:</td><td><input type="text" name="ans" id="ans"></td><br>
</tr>
<tr>
<td></td><td><input type="submit" value="Update"></td><br>
</tr>
</table>

</form>
</div>
</body>
<script>
document.getElementById("updatequestion").classList.add("active");
function showcurrentq()
{
	qno=document.getElementById("qno").value;
	document.getElementById("question").value=question[qno-1];
	document.getElementById("a").value=optiona[qno-1];
	document.getElementById("b").value=optionb[qno-1];
	document.getElementById("c").value=optionc[qno-1];
	document.getElementById("d").value=optiond[qno-1];
	document.getElementById("ans").value=ans[qno-1];

}
showcurrentq();
</script>
</html>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$id=$_POST["qno"];
	$question=$_POST["question"];
	$a=$_POST["a"];
	$b=$_POST["b"];
	$c=$_POST["c"];
	$d=$_POST["d"];
	$ans=$_POST["ans"];
	$sql="DELETE FROM QUESTION WHERE ID='$id'";
	if($conn->query($sql))
		;
	$sql="INSERT INTO QUESTION VALUES ('$id','$question','$a','$b','$c','$d','$ans')";
	if($conn->query($sql))
	{
		header("Location:updatequestion.php");
	}
	else
	echo'<script>alert("Question not updated");</script>';
	
}
?>