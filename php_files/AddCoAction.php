<?php
	include 'SessionCreatedCheck.php';
	include 'MysqlConnectionCreated.php';
	$co = $_REQUEST['CO'];
	$course = $_REQUEST['courseSelect'];
	$count = 0;
	$id = 0;
	$query1 = "SELECT ID FROM coursewiseco";
	$result1 = mysqli_query($con, $query1);
	while($row = mysqli_fetch_array($result1))
	{
		$count = $count + 1;
	}
	$id = $count + 1;
	$query = "INSERT INTO coursewiseco(ID, COURSE, CO) VALUES('$id', '$course', '$co')";
	// echo($query);
	if(mysqli_query($con,$query))
	{
		echo "Row Inserted Successfully!!";
		header("location:COAttainment.php");
	}
	else
	{
		echo "$query";
		echo "Row Not Inserted!!";
	}
?> 