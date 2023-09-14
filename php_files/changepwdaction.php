<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	
	$uname = $_SESSION['userID'];
	$newpwd = $_REQUEST['newpwd'];
	$query = "UPDATE userdetails SET PASSWORD='$newpwd' WHERE USERNAME='$uname'";
	echo "$query";

	if(mysqli_query($con,$query))
	{
		echo "Row Inserted Successfully!!";
		header("location:Dashboard.php");
	}
	else
	{
		// echo "$query";
		echo "Row Not Inserted!!";
	}
?> 