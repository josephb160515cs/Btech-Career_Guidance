<?php
session_start();
if($_SESSION["uname"]==null)
	header("Location:index.php")
?>