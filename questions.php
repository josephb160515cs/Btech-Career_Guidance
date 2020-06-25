<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Dashboard|Test</title>
<link rel="stylesheet" href="stylesheet/questions.css">
<?php require 'dbconnection.php'?>
<?php 
$sql="SELECT  * FROM QUESTION";
$result=$conn->query($sql);
if($result->num_rows==0)
	die("ERROR:Question cannot be retrieved from database");
$counter=0;
echo '<script> var question=[];var optiona=[];var optionb=[];var optionc=[];var optiond=[];';
	while($row=$result->fetch_assoc())
{
	   echo 'question['.$counter.']="'.$row["question"].'";';
	   echo 'optiona['.$counter.']="'.$row["1"].'";';
	   echo 'optionb['.$counter.']="'.$row["2"].'";';
	   echo 'optionc['.$counter.']="'.$row["3"].'";';
	   echo 'optiond['.$counter.']="'.$row["4"].'";';

++$counter;
}
echo '</script>';
?>
<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}

document.onkeydown = function (e) {
        return false;
}

var qno=1;
var ans=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
</script>
</head>
<body>

<div id="page">
<div id="timer">
<?php require 'timer.php'?>
</div>

<div id="question">
 <p id="ques"></p>
 <label for="a">A.<input type="radio" name="option" value="a" id="a"><span id="optiona"></span></label><br>
 <label for="b">B.<input type="radio" name="option" value="b" id="b"><span id="optionb"></span></label><br>
 <label for="c">C.<input type="radio" name="option" value="c" id="c"><span id="optionc"></span></label><br>
 <label for="d">D.<input type="radio" name="option" value="d" id="d"><span id="optiond"></span></label><br>
 <input type="button" onclick="clearoption()" value="clearchoice" id="clear">
 <input type="button" onclick="flagquestion()" value="&#9873 flag" id="flag">
 <input type="button" onclick="prev()" value="<<prev" id="prev">
 <input type="button" onclick="next()" value="next>>" id="next">
</div>
<form action="result.php" method="post" id="form1">
<input type="hidden" name="ans" id="ans">
</form>
<div id="goto">
<input type="button" onclick="goto(1)" value="1" id="1">
<input type="button" onclick="goto(2)" value="2" id="2">
<input type="button" onclick="goto(3)" value="3" id="3">
<input type="button" onclick="goto(4)" value="4" id="4">
<input type="button" onclick="goto(5)" value="5" id="5"><br>
<input type="button" onclick="goto(6)" value="6" id="6">
<input type="button" onclick="goto(7)" value="7" id="7">
<input type="button" onclick="goto(8)" value="8" id="8">
<input type="button" onclick="goto(9)" value="9" id="9">
<input type="button" onclick="goto(10)" value="10" id="10"><br>
<input type="button" onclick="goto(11)" value="11" id="11">
<input type="button" onclick="goto(12)" value="12" id="12">
<input type="button" onclick="goto(13)" value="13" id="13">
<input type="button" onclick="goto(14)" value="14" id="14">
<input type="button" onclick="goto(15)" value="15" id="15"><br>
<input type="button" onclick="goto(16)" value="16" id="16">
<input type="button" onclick="goto(17)" value="17" id="17">
<input type="button" onclick="goto(18)" value="18" id="18">
<input type="button" onclick="goto(19)" value="19" id="19">
<input type="button" onclick="goto(20)" value="20" id="20"><br>
<input type="button" onclick="goto(21)" value="21" id="21">
<input type="button" onclick="goto(22)" value="22" id="22">
<input type="button" onclick="goto(23)" value="23" id="23">
<input type="button" onclick="goto(24)" value="24" id="24">
<input type="button" onclick="goto(25)" value="25" id="25"><br>
<input type="button" onclick="goto(26)" value="26" id="26">
<input type="button" onclick="goto(27)" value="27" id="27">
<input type="button" onclick="goto(28)" value="28" id="28">
<input type="button" onclick="goto(29)" value="29" id="29">
<input type="button" onclick="goto(30)" value="30" id="30"><br>
<br>
<br>
</div>
<input type="button" onclick="submit()" value="submit" id="submit">
</div>
</body>
<script>
function showcurrentq()
{
	document.getElementById("ques").innerText=qno+") "+question[qno-1];
	document.getElementById("optiona").innerText=optiona[qno-1];
	document.getElementById("optionb").innerText=optionb[qno-1];
	document.getElementById("optionc").innerText=optionc[qno-1];
	document.getElementById("optiond").innerText=optiond[qno-1];

	 if(ans[qno-1]==1)
		document.getElementById("a").checked=true;
	else if(ans[qno-1]==2)
		document.getElementById("b").checked=true;
	else if(ans[qno-1]==3)
		document.getElementById("c").checked=true;
	else if(ans[qno-1]==4)
		document.getElementById("d").checked=true;
}
function storeselection()
{
	if(document.getElementById("a").checked)
	{
		ans[qno-1]=1;
		clearoption();
	}
else if(document.getElementById("b").checked)
	{
	ans[qno-1]=2;
	clearoption();
	}
else if(document.getElementById("c").checked)
	{
		ans[qno-1]=3;
		clearoption();
	}
else if(document.getElementById("d").checked)
	{
	ans[qno-1]=4;
	clearoption();
	}
else
	ans[qno-1]=0;

}
function clearoption()
{
	document.querySelector('input[name="option"]:checked').checked = false;
}
function goto(id)
{
	if(qno!=id)
	{
		storeselection();
		qno=id;
		showcurrentq();
	}
}
function flagquestion()
{
	if(document.getElementById(qno).style.backgroundColor=="yellow")
		document.getElementById(qno).style.backgroundColor="#DDDDDD";
	else
		document.getElementById(qno).style.backgroundColor="yellow";
}
function prev()
{
	if(qno!=1)
	{
		storeselection();
		qno=qno-1;
		showcurrentq();
	}
}
function next()
{
	if(qno!=30)
	{
		storeselection();
		qno=qno+1;
		showcurrentq();
	}
	else
	{
		submit();
	}
}
function submit()
{
	storeselection();
 document.getElementById("ans").value=ans;
// document.write(document.getElementById("ans").value);
  document.getElementById("form1").submit();
}
    showcurrentq();
</script>
</html>