<link rel="stylesheet" href="stylesheet/menu.css">
<ul class="menu">
<h1>HELLO!</h1>
<h2><?php echo $_SESSION["admin"];?></h2>
<li id="removeuser"><a href="removeuser.php" title="remove user">Remove User</a></li>
<li id="updatequestion"><a href="updatequestion.php" title="update question">Update Questions</a></li>
<li id="addcourse"><a href="addcourse.php" title="add course">Add Course</a></li>
<li id="addbook"><a href="addbook.php" title="add book">Add Book</a></li>
<li id="removebook"><a href="removebook.php" title="remove book">Remove Book</a></li>
<li id="logout"><a href="logout.php" title="logout" id="logouta">&#10162;Log out</a></li>
</ul>