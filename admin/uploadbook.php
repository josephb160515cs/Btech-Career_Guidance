<?php require 'dbconnection.php';?>
<?php 
	if(isset($_POST['submit']))
	{
	$name=$_POST['name'];
	$imglocation='../Images/'.$name.'.'.pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION);
	$filelocation='../Books/'.$name.'.'.pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
	$flag=1;
	if($flag==1)
	{
		if(move_uploaded_file($_FILES["img"]["tmp_name"],$imglocation))
			echo'<script>alert("IMG  inseted");</script>';
		else
			echo'<script>alert("IMG not inseted");</script>';
		if(move_uploaded_file($_FILES["file"]["tmp_name"],$filelocation))
			echo'<script>alert("FILE  inseted");</script>';
		else
			echo'<script>alert("FILE  not inseted");</script>';
	
	$imgname=$name.'.'.pathinfo($imglocation,PATHINFO_EXTENSION);
	$fileloc='Books/'.$name.'.'.pathinfo($filelocation,PATHINFO_EXTENSION);
	$sql="INSERT INTO BOOK (IMGNAME,NAME,FILELOCATION) VALUES ('$imgname','$name','$fileloc')";
	if($conn->query($sql))
	{
		header("Location:addbook.php");
	}
	else
	echo'<script>alert("Book not inseted");</script>';
	}
	else
	echo'<script>alert("File already exists");</script>';
}
?>