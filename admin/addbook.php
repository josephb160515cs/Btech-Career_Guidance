<!DOCTYPE html>
<html>
<head>
<?php require 'logincheck.php';?>
<title>Add Book</title>
<link rel="stylesheet" href="stylesheet/addbook.css">
</head>
<body>
<div id="menubar">
<?php require 'menu.php';?>
</div>

<div id="page">
<form action="uploadbook.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Name:</td><td><input type="text" name="name" id="name"></td>
</tr>
<tr>
<td>Img:</td><td><input type="file" name="img" id="img" accept=".jpg" onchange="uploadFile()"></td>
</tr>
<tr>
<td>File:</td><td><input type="file" name="file" id="file" accept=".pdf "></td>
</tr>
<tr>
<td></td><td><input type="submit" value="Update" name="submit"></td>
</tr>
</table>
</form>
</div>

</body>
<script>
function uploadFile() {
  var file = document.getElementById("img").files[0];
   alert(file.name+" | "+file.size+" | "+file.type);
  var ajax = window.XMLHttpRequest();
  //document.getElementById("imgprogress").style.display="block";
  ajax.upload.addEventListener("progress", progressHandler, false);
  

}
function showimgprogress(e)
{
	var progress=document.getElementById("imgprogress");
	progress.val=e.loaded/e.total*100;

}
document.getElementById("addbook").classList.add("active");
</script>
</html>
